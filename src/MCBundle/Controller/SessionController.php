<?php

namespace MCBundle\Controller;

use MCBundle\Entity\Film;
use MCBundle\Entity\Session;
use MCBundle\Entity\Address;
use MCBundle\Entity\Material;
use MCBundle\Entity\Genre;

use MCBundle\Form\SessionType;
use MCBundle\Form\MaterialType;
use MCBundle\Form\AddressType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use FOS\UserBundle\Model\User;


class SessionController extends Controller
{
    /**
     * @Route("/seances", name="session_all")
     * Get all sessions
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $limitPage = 16;
        $numberPage = 1;

        $em = $this->getDoctrine()->getManager();
        $result = $em->getRepository('MCBundle:Session')->findAll();

        $sessions = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );
        return $this->render(
            'MCBundle:Pages:sessions.html.twig',
            array(
                "sessions" => $sessions
            )
        );
    } 



    /**
     * @Route("/seances/view/{slug}", name="session_view")
     * @param $slug
     * @return Response
     */
    public function viewSessionsAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $em->getRepository('MCBundle:Session')->find($slug);

        return $this->render('MCBundle:Pages:viewSession.html.twig', array(
            "session" => $session,
        ));

    }
    
    /**
     * Get all sessions for each Id Film
     * @param $idFilm
     * @return Response
     */
    public function sessionByFilmAction($idFilm)
    {
        $em = $this->getDoctrine()->getManager();
        $sessions = $em->getRepository('MCBundle:Session')->fin($idFilm);
        $film = $em->getRepository('MCBundle:Film')->find($idFilm);

        return $this->render(
            'MCBundle:Pages:films.html.twig',   
            array(
                "sessions" => $sessions,
                "film" => $film,
            )
        );
    }

    /**
     * @param Request $request
     * @Route("/session/remove", name="session_remove",  options = {"expose"=true})
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
            $message = "La séance " . "(<b>" .$session->getFilm()->getTitle(). " -  ".$session->getTypeView() ."</b>)  a été supprimée.";
            //$em->remove($session);
            //$em->flush();
            return new Response(json_encode(array('result' => 'success', 'message' => $message)));
        }
        return new response (json_encode(array('result' => 'error', "message" => "Error: isXmlHttpRequest")));
    }


    /**
     * Get all sessions
     * @param Request $request
     * @Route("/sessions/add", name="session_add")
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
                // $em = $this->getDoctrine()->getManager();
                $cine = $this->get("mc_allocine");
                $result = $cine->get($session->getFilmId());
                $data = json_decode($result);
                // dump($data);

                $film = $this->parserMovie($data->movie);
                if ($film->getISAN()) {
                    $em->persist($film);
                    $em->flush();
                    $film = $em->getRepository('MCBundle:Film')->find($film->getId());
                }

            }
            $session->setFilm($film);
            //$creator = $user = $this->get('security.context')->getToken()->getUser();
            $creator = $user = $this->getUser();
            $session->setCreator($creator);

            $em->persist($session);
            $em->flush();

            $request->getSession()->set('add-session', true);
            return $this->redirectToRoute('session_view', array('slug' => $session->getId()), 301);

        }

        return $this->render('MCBundle:Pages:add-sessions.html.twig', array(
            'form' => $form->createView(),
            'formMaterial' => $formMaterial->createView(),
            'formAddress' => $formAddress->createView(),
        ));
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

            //dump($movies);
            //die;
            if (count($movies) > 0) {
                if (array_key_exists('feed', $movies) && array_key_exists('movie', $movies->feed)) {

                    foreach ($movies->feed->movie as $movie) {
                        $title = null;
                        if (array_key_exists('title', $movie))
                            $title = $movie->title;

                        if ($title == null && array_key_exists('originalTitle', $movie))
                            $title = $movie->originalTitle;

                        if (array_key_exists('poster', $movie) && array_key_exists('href', $movie->poster)) {
                            $poster = $movie->poster->href;
                        }

                        if ($title !== null) {
                            $search["code"] = $movie->code;
                            $search["title"] = $title;
                            if (isset($poster) && !empty($poster)) {
                                $search["poster"] = $poster;
                            }
                            $data[] = $search;
                        }
                    }
                }
            }
            return new Response(json_encode(array('response' => 'success', 'result' => $data)));
        }
        return new response (json_encode(array('response' => 'error', "result" => "Error: isXmlHttpRequest")));
    }


    public function addSession()
    {

        $em = $this->getDoctrine()->getManager();
        $session = new Session();
        $session->setDate(new \DateTime("2016-6-25"));
        $session->setTypeView("VOSTFR");
        $session->setDescription("Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur. ");
        $session->setContribution("Chips, soda, coca ou tout ce que vous voulez apporter ");
        $session->setPrice(6);
        $session->setMaxPlace(5);

        $address = $em->getRepository('MCBundle:Address')->find(1);
        $session->setAddress($address);

        $material = $em->getRepository('MCBundle:Material')->find(3);
        $session->addMaterial($material);
        $material = $em->getRepository('MCBundle:Material')->find(1);
        $session->addMaterial($material);
        $material = $em->getRepository('MCBundle:Material')->find(2);
        $session->addMaterial($material);

        $modality = $em->getRepository('MCBundle:Modality')->find(2);
        $session->setModality($modality);
        $film = $em->getRepository('MCBundle:Film')->find(2);
        $session->setFilm($film);
        $user = $em->getRepository('UserBundle:User')->find(1);
        $session->setCreator($user);

//        $em->persist($session);
//        $em->flush();
        return new Response("Add");
    }


}
