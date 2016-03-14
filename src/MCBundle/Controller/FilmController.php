<?php

namespace MCBundle\Controller;

use MCBundle\Entity\Film;

use MCBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class FilmController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lastFilms = $em->getRepository('MCBundle:Film')->lastFilm(4);
        $newFilms = $em->getRepository('MCBundle:Film')->newFilm(4);
        $topFilms = $em->getRepository('MCBundle:Film')->topFilm(4);

        return $this->render(
            'MCBundle:Pages:filmsIndex.html.twig',
            array(
                "lastFilms" => $lastFilms,
                "newFilms" => $newFilms,
                "topFilms" => $topFilms,
            )
        );

    }

    public function getFilmAction($action = null, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $limitPage = 8;
        $numberPage = 1;

        if ($action == null || $action == "all") {
            $result = $em->getRepository('MCBundle:Film')->findAll();
            $title = "Tous les films";
        } else if ($action == "last_add") {
            $result = $em->getRepository('MCBundle:Film')->lastFilm();
            $title = "Tous les films récemment ajoutés";

        } else if ($action == "new_film") {
            $result = $em->getRepository('MCBundle:Film')->newFilm();
            $title = "Toutes les nouveautés";

        } else if ($action == "top_film") {
            $result = $em->getRepository('MCBundle:Film')->topFilm();
            $title = "Top films";
        } else {
            $result = array();
            $title = "Aucun film trouvé";

        }

        $films = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );
        return $this->render(
            'MCBundle:Pages:films.html.twig',
            array(
                "films" => $films,
                "title" => $title,
            )
        );
    }

    /**
     * @param $slug
     * @return Response
     */
    public function viewFilmAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository('MCBundle:Film')->find($slug);
        return $this->render('MCBundle:Pages:viewFilm.html.twig', array(
            "film" => $film,
        ));

    }


    public function addFilmAction()
    {
        $em = $this->getDoctrine()->getManager();
        $film = new Film();

        $allocine = $this->get("mc_allocine");
        $result = $allocine->get(47111);
        $data = json_decode($result);
        if (!empty($data)) {
            $movie = $data->movie;
            $film->setISAN($movie->code);
            $film->setTitle($movie->title);
            $film->setOriginalTitle($movie->originalTitle);

            $film->setReleaseDate($movie->release->releaseDate);
            $film->setDirectors($movie->castingShort->directors);
            $film->setActors($movie->castingShort->actors);
            $nationality = "";
            foreach ($movie->nationality as $data) {
                $nationality .= $this->get("mc_allocine")->getObject($data);
            }
            $film->setNationality($nationality);
            $film->setRuntime($movie->runtime);
            $film->setAgeLimit(10);
            $film->setPressRating($movie->statistics->pressRating);
            $film->setUserRating($movie->statistics->userRating);
            if (!empty($movie->link)) {
                $film->setLink($movie->link[0]->href);
            }

            $film->setTrailer($movie->trailerEmbed);
            $film->setPoster($movie->poster->href);
            $film->setSynopsis($movie->synopsis);
            $film->setSynopsisShort($movie->synopsisShort);
            foreach ($movie->genre as $data) {
                $genre = $this->get("mc_allocine")->getObject($data);
                $objGenre = $em->getRepository('MCBundle:Genre')->findOneByTitle($genre);
                if (!$objGenre) {
                    $objGenre = new Genre();
                    $objGenre->setTitle($genre);
                    $em->persist($objGenre);
                    $em->flush();
                    $objGenre = $em->getRepository('MCBundle:Genre')->findOneByTitle($genre);
                }
                $film->addGenre($objGenre);
            }
            dump($movie);
            dump($film);

        }
        $em->persist($film);
        $em->flush();
        return new Response("Add");

    }


    public function removeFilmAction($id)
    {

    }

    public function parserMovie($film)
    {
        $data = array();
        if ($film) {
            $data['id'] = $film->getID();
            $data['ISAN'] = $film->getISAN();
            $data['title'] = $film->getTitle();
            $data['releaseDate'] = $film->getReleaseDate();
            $data['directors'] = $film->getDirectors();
            $data['actors'] = $film->getActors();
            $data['duration'] = $film->getDuration();
            $data['ageLimit'] = $film->getAgeLimit();
            $data['pressRating'] = $film->getPressRating();
            $data['userRating'] = $film->getUserRating();
            $data['link'] = $film->getLink();
            $data['description'] = $film->getDescription();
            $data['category'] = $film->getCategory()->getTitle();
        }
        return $data;
    }


    public function searchAllocineFilmAction($keyword)
    {
        $allocine = $this->get("mc_allocine");
        $result = $allocine->search($keyword);

        return $this->render(
            'MCBundle:Pages:filmsSearch.html.twig',
            array(
                "motsCles" => $keyword,
                "movies" => json_decode($result)
            )
        );
    }

    /**
     * @param $code
     * @return Response
     */
    public function getFilmAllocineAction($code)
    {
        $allocine = $this->get("mc_allocine");
        $result = $allocine->get($code);

        return $this->render('MCBundle:Pages:viewAllocineFilm.html.twig', array(
            "result" => json_decode($result),
        ));
    }


}
