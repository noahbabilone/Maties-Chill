<?php

namespace MCBundle\Controller\BackOffice;

use MCBundle\Controller\FilmController;
use MCBundle\Entity\Address;
use MCBundle\Entity\Material;
use MCBundle\Entity\Genre;

use MCBundle\Form\MaterialType;
use MCBundle\Form\AddressType;
use MCBundle\Form\SessionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MCBundle\Entity\Film;
use MCBundle\Entity\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class SessionBOController extends Controller
{

    /**
     * Get all sessions
     * @param Request $request
     * @Route("/dashboard", name="dashboard")
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limitPage = 10;
        $numberPage = 1;

        $result = $em->getRepository('MCBundle:Session')->findAll();
        $sessions = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );
        $data = array("sessions" => $sessions);
        return $this->render('MCBundle:BackOffice:index.html.twig', $data);
    }

    /**
     * Get all sessions
     * @param Request $request
     * @Route("/sessions", name="list_sessions")
     * @return Response
     */
    public function listSessionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $limitPage = 10;
        $numberPage = 1;

        $result = $em->getRepository('MCBundle:Session')->getDescSessions();
        $sessions = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );

        $data = array("sessions" => $sessions);
        if ($request->getSession()->has('add-session')) {
            $data['result'] = $request->getSession()->get('add-session');
            $data['message'] = "La séance a été créée.";
            $request->getSession()->remove('add-session');
        }


        return $this->render('MCBundle:BackOffice:sessions.html.twig', $data);
    }

    /**
     * Get all sessions
     * @param Request $request
     * @Route("/sessions/add", name="add_session")
     * @return Response
     */
    public function addSessionAction(Request $request)
    {
        $session = new Session();
        $form = $this->createForm(new SessionType(), $session);
        $formMaterial = $this->createForm(new MaterialType(), new Material());
        $formAddress = $this->createForm(new AddressType(), new Address());

        if ($form->handleRequest($request)->isValid() && $session->getFilmId()) {
            $em = $this->getDoctrine()->getManager();
            $film = $em->getRepository('MCBundle:Film')->findOneBy(array('ISAN' => $session->getFilmId()));
            if (!$film) {
                $em = $this->getDoctrine()->getManager();
                $cine = $this->get("mc_allocine");
                $result = $cine->get($session->getFilmId());
                $data = json_decode($result);
                dump($data);

                $film = $this->parserMovie($data->movie);
                if ($film->getISAN()) {
                    $em->persist($film);
                    $em->flush();
                    $film = $em->getRepository('MCBundle:Film')->find($film->getId());
                }

            }
            $session->setFilm($film);
            $creator = $user = $this->get('security.context')->getToken()->getUser();
            $session->setCreator($creator);
            $em->persist($session);
            $em->flush();

            $request->getSession()->set('add-session', true);
            return $this->redirectToRoute('list_sessions', array(), 301);

        }

        return $this->render('MCBundle:BackOffice:add-sessions.html.twig', array(
            'form' => $form->createView(),
            'formMaterial' => $formMaterial->createView(),
            'formAddress' => $formAddress->createView(),
        ));
    }


    /**
     * @param Request $request
     * @Route("/session/remove", name="back_office_remove_session",  options = {"expose"=true})
     * @return response
     * @throws NotFoundHttpException
     */
    public function removeSessionAction(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $id = $request->get('id');
            $session = $em->getRepository('MCBundle:Session')->find($id);
            if (null === $session) {
                throw new NotFoundHttpException("La séance (ID: " . $id . ") n'existe pas.");
            }
            $message = 'La séance ' . '(ID: <b>' . $session->getId() . '</b>) ' . $session->getFilm()->getTitle() . ' a été supprimée.';
            //$em->remove($session);
            //$em->flush();
            return new Response(json_encode(array('result' => 'success', 'message' => $message)));
        }
        return new response (json_encode(array('result' => 'error', "message" => "Error: isXmlHttpRequest")));
    }


    /**
     * Get all sessions
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


    /**
     * @param Request $request
     * @Route("/search_Film", name="search_film_ajax",  options = {"expose"=true})
     * @return response
     * @throws NotFoundHttpException
     */
    public function searchFilmAjaxAction(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $keyword = $request->get('search');
            $films = $em->getRepository('MCBundle:Film')->searchDB($keyword);
            $data = array();
            foreach ($films as $film) {
                $data[] = array("title" => $film->getTitle(), "code" => $film->getISAN());
            }

            $allocine = $this->get("mc_allocine");
            $result = $allocine->search($keyword, $page = 1, $count = 10);
            $movies = json_decode($result);
            if (count($movies) > 0) {
                if (array_key_exists('feed', $movies) && array_key_exists('movie', $movies->feed)) {

                    foreach ($movies->feed->movie as $movie) {
                        $title = null;
                        if (array_key_exists('title', $movie))
                            $title = $movie->title;

                        if ($title == null && array_key_exists('originalTitle', $movie))
                            $title = $movie->originalTitle;

                        if ($title !== null) {
                            $data[] = array("title" => $title, "code" => $movie->code);
                        }
                    }
                }
            }
            return new Response(json_encode(array('response' => 'success', 'result' => $data)));
        }
        return new response (json_encode(array('response' => 'error', "result" => "Error: isXmlHttpRequest")));
    }


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
