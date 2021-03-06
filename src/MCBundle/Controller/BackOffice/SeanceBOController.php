<?php

namespace MCBundle\Controller\BackOffice;

use MCBundle\Controller\FilmController;
use MCBundle\Entity\Address;
use MCBundle\Entity\Material;
use MCBundle\Entity\Genre;

use MCBundle\Form\MaterialType;
use MCBundle\Form\AddressType;
use MCBundle\Form\SeanceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MCBundle\Entity\Film;
use MCBundle\Entity\Seance;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class SeanceBOController extends Controller
{

    /**
     * Get all seances
     * @param Request $request
     * @Route("/dashboard", name="dashboard")
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limitPage = 10;
        $numberPage = 1;

        $result = $em->getRepository('MCBundle:Seance')->findAll();
        $seances = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );
        $data = array("seances" => $seances);
        return $this->render('MCBundle:BackOffice:index.html.twig', $data);
    }

    /**
     * Get all seances
     * @param Request $request
     * @Route("/seances", name="list_seances")
     * @return Response
     */
    public function listSeanceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limitPage = 10;
        $numberPage = 1;

        $result = $em->getRepository('MCBundle:Seance')->getDescSeances();
        $seances = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );

        $data = array("seances" => $seances);
        if ($request->getSeance()->has('add-seance')) {
            $data['result'] = $request->getSeance()->get('add-seance');
            $data['message'] = "La séance a été créée.";
            $request->getSeance()->remove('add-seance');
        }


        return $this->render('MCBundle:BackOffice:seances.html.twig', $data);
    }

    /**
     * Get all seances
     * @param Request $request
     * @Route("/seances/add", name="add_seance")
     * @return Response
     */
    public function addSeanceAction(Request $request)
    {
        $seance = new Seance();
        $form = $this->createForm(new SeanceType(), $seance);
        $formMaterial = $this->createForm(new MaterialType(), new Material());
        $formAddress = $this->createForm(new AddressType(), new Address());

        if ($form->handleRequest($request)->isValid() && $seance->getFilmId()) {
            $em = $this->getDoctrine()->getManager();
            $film = $em->getRepository('MCBundle:Film')->findOneBy(array('ISAN' => $seance->getFilmId()));
            if (!$film) {
               // $em = $this->getDoctrine()->getManager();
                $cine = $this->get("mc_allocine");
                $result = $cine->get($seance->getFilmId());
                $data = json_decode($result);
               // dump($data);

                $film = $this->parserMovie($data->movie);
                if ($film->getISAN()) {
                    $em->persist($film);
                    $em->flush();
                    $film = $em->getRepository('MCBundle:Film')->find($film->getId());
                }

            }
            $seance->setFilm($film);
            $creator = $user = $this->get('security.context')->getToken()->getUser();
            $seance->setCreator($creator);
            $em->persist($seance);
            $em->flush();

            $request->getSeance()->set('add-seance', true);
            return $this->redirectToRoute('list_seances', array(), 301);

        }

        return $this->render('MCBundle:BackOffice:add-seances.html.twig', array(
            'form' => $form->createView(),
            'formMaterial' => $formMaterial->createView(),
            'formAddress' => $formAddress->createView(),
        ));
    }



    /**
     * Get all seances
     * @param Request $request
     * @Route("/films", name="list_films")
     * @return Response
     */
    public function listFilmAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limitPage = 10;
        $numberPage = 1;

        $result = $em->getRepository('MCBundle:Film')->findAll();
        $films = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );

        return $this->render('MCBundle:BackOffice:films.html.twig', array(
            "films" => $films
        ));
    }


    /**
     *
     * @Route("/other", name="other")
     */
    public function otherAction()
    {
        die('Other');
        return $this->render('MCBundle:BackOffice:index.html.twig');
    }

    /*
     * Ajout une séance
     * Trier par colonne
     * Fitre séance
     * recherche séance
     * 
     * */




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
            if (array_key_exists('poster', $movie) && array_key_exists('href', $movie->poster))
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

}
