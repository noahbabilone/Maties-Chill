<?php

namespace MCBundle\Controller\BackOffice;

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

        return $this->render('MCBundle:BackOffice:index.html.twig', array(
            "sessions" => $sessions
        ));
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

        $result = $em->getRepository('MCBundle:Session')->findAll();
        $sessions = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );

        return $this->render('MCBundle:BackOffice:sessions.html.twig', array(
            "sessions" => $sessions
        ));
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
        $em = $this->getDoctrine()->getManager();

        if ($form->handleRequest($request)->isValid()) {

            die;
        }

        return $this->render('MCBundle:BackOffice:add-sessions.html.twig', array(
            'form' => $form->createView(),
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
            $result = $allocine->search($keyword, $page = 1, $count = 7);
            $movies = json_decode($result);
            if (count($movies) > 0) {
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
            return new Response(json_encode(array('response' => 'success', 'result' => $data)));
        }
        return new response (json_encode(array('response' => 'error', "result" => "Error: isXmlHttpRequest")));
    }


}
