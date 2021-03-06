<?php

namespace MCBundle\Controller;

use MCBundle\Entity\Film;

use MCBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class FilmController extends Controller
{
    /**
     * @Route("/films", name="film_home")
     * Get all seances
     * @return Response
     */
    public function filmsIndexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $limit = 10;
        $lastFilms = $em->getRepository('MCBundle:Film')->lastFilm($limit);
        $newFilms = $em->getRepository('MCBundle:Film')->newFilm($limit);
        $topFilms = $em->getRepository('MCBundle:Film')->topFilm($limit);

        return $this->render(
            'MCBundle:Pages:filmsIndex.html.twig',
            array(
                "lastFilms" => $lastFilms,
                "newFilms" => $newFilms,
                "topFilms" => $topFilms,
            )
        );

    }

    /**
     * @Route("/films/view/{slug}", name="film_view")
     * @param $slug
     * @return Response
     */
    public function viewFilmAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository('MCBundle:Film')->find($slug);
        $resultSeances = $em->getRepository('MCBundle:Film')->filmSeance($film->getId());
        //dump($resultSeances);
        //die;
        return $this->render('MCBundle:Pages:filmView.html.twig', array(
            "film" => $film,
            "resultSeances" => $resultSeances,
        ));

    }


    /**
     * @Route("/films/{action}", name="film_action")
     * Get all seances
     * @param null $action
     * @param Request $request
     * @return Response
     */
    public function getFilmsAction($action = null, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $limitPage = 15;
        $numberPage = 1;

        if ($action == null || $action == "all") {
            $result = $em->getRepository('MCBundle:Film')->findAll();
            $title = "Tous les films";
            $breadcrumb = "Tous";
        } else if ($action == "last_add") {
            $result = $em->getRepository('MCBundle:Film')->lastFilm();
            $title = "Récents";
            $breadcrumb = "Récents";

        } else if ($action == "news") {
            $result = $em->getRepository('MCBundle:Film')->newFilm();
            $title = "Nouveautés";
            $breadcrumb = "Nouveautés";

        } else if ($action == "top") {
            $result = $em->getRepository('MCBundle:Film')->topFilm();
            $title = "Top films";
            $breadcrumb = "Top-film";
        } else {
            $result = array();
            $title = "Aucun film trouvé";
            $breadcrumb = "Aucun";
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
                "titlePage" => $title,
                "breadcrumb" => $breadcrumb,
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
     * @Route("/allocine/get/{code}", name="allocine_get")
     * @param $code
     * @return Response
     */
    public function addFilmDB($code)
    {
        $em = $this->getDoctrine()->getManager();
        $allocine = $this->get("mc_allocine");
        $result = $allocine->get($code);
        $data = json_decode($result);

        dump($data);
        die;
        $film = $this->parserMovie($data->movie);
        if ($film->getISAN()) {
            $em->persist($film);
            $em->flush();
            return true;
        }
        return false;

    }


    /**
     * @return Film
     */
    public function parserMovie($movie)
    {
        $film = new Film();
        if (!empty($movie)) {
            $em = $this->getDoctrine()->getManager();
            $film->setISAN($movie->code);
            $film->setTitle($movie->title);
            if (array_key_exists('originalTitle', $movie))
                $film->setOriginalTitle($movie->originalTitle);

            if (array_key_exists('release', $movie))
                $film->setReleaseDate($movie->release->releaseDate);

            if (array_key_exists('castingShort', $movie))
                $film->setDirectors($movie->castingShort->directors);

            if (array_key_exists('castingShort', $movie))
                $film->setActors($movie->castingShort->actors);
            if (array_key_exists('nationality', $movie)) {
                $nationality = "";
                foreach ($movie->nationality as $data) {
                    $nationality .= $this->get("mc_allocine")->getObject($data);
                }
                $film->setNationality($nationality);
            }
            if (array_key_exists('runtime', $movie))
                $film->setRuntime($movie->runtime);
            $film->setAgeLimit(10);

            if (array_key_exists('statistics', $movie) && array_key_exists('pressRating', $movie->statistics))
                $film->setPressRating($movie->statistics->pressRating);
            if (array_key_exists('statistics', $movie) && array_key_exists('userRating', $movie->statistics))
                $film->setUserRating($movie->statistics->userRating);

            if (array_key_exists('link', $movie)) {
                if (!empty($movie->link)) {
                    $film->setLink($movie->link[0]->href);
                }
            }
            if (array_key_exists('trailerEmbed', $movie))
                $film->setTrailer($movie->trailerEmbed);
            if (array_key_exists('poster', $movie))
                $film->setPoster($movie->poster->href);
            if (array_key_exists('synopsis', $movie))
                $film->setSynopsis($movie->synopsis);
            if (array_key_exists('synopsisShort', $movie))
                $film->setSynopsisShort($movie->synopsisShort);
            if (array_key_exists('genre', $movie)) {
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
            }

        }
        return $film;
    }

    /**
     * @Route("/allocine/{keyword}", name="allocine")
     * @param $keyword
     * @return Response
     */
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

    public function parserMovieTab($film)
    {
        $data = array();
        if ($film) {
            $data['id'] = $film->getID();
            $data['ISAN'] = $film->getISAN();
            $data['title'] = $film->getTitle();
            $data['releaseDate'] = $film->getReleaseDate();
            $data['directors'] = $film->getDirectors();
            $data['actors'] = $film->getActors();
            $data['runtime'] = $film->getRuntime();
            $data['ageLimit'] = $film->getAgeLimit();
            $data['pressRating'] = $film->getPressRating();
            $data['userRating'] = $film->getUserRating();
            $data['link'] = $film->getLink();
            $data['synopsis'] = $film->getSynopsis();
            $genreFilm = "";
            foreach ($film->getGenre() as $genre) {
                $genreFilm .= $genre->getTitle();
            }

            $data['genre'] = $genreFilm;
        }
        return $data;
    }
}
