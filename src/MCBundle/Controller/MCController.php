<?php

namespace MCBundle\Controller;

use MCBundle\Entity\Film;
use MCBundle\Entity\Session;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class MCController extends Controller
{
   
    /**
     * @Route("/", name="home_page")
     * @return Response
     */
    public function ssindexAction()
    {
        $user = $this->getUser();
        if ($user) {
            $userSession = $this->get('session');
            $em = $this->getDoctrine()->getManager();
            $sessions = $em->getRepository('MCBundle:Session')->findByCreator($user->getId());

            $userSession->set('nbSession', COUNT($sessions));
            $nbParticipant = 0;
            foreach ($sessions as $session) {
                $nbParticipant += COUNT($session->getParticipant());
            }

            $userSession->set('nbParticipant', $nbParticipant);

        }
        return $this->render('MCBundle:Pages:index.html.twig');
    }


    /**
     * @Route("/search", name="search_")
     * Get all sessions
     * @param Request $request
     * @return Response
     */
    public function searchAction(Request $request)
    {
        $limitPage = 16;
        $numberPage = 1;

        $em = $this->getDoctrine()->getManager();

        $search = ($request->get('q') != null) ? $request->get('q') : null;
        $result = $em->getRepository('MCBundle:Session')->search($search);


        $sessions = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );
        return $this->render(
            'MCBundle:Pages:search.html.twig',
            array(
                "sessions" => $sessions
            )
        );
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function searchFilmAction(Request $request)
    {
        $keyword = "";
        $data = array();
        $search = new SearchFilm;
        $formSearch = $this->createForm(new SearchFilmType(), $search);
        if ($formSearch->handleRequest($request)->isValid() && !empty($search->getTitle())) {
            $keyword = $search->getTitle();
            $allohelper = $this->get("mc_allo_helper");
            $page = 1;

            try {
                $result = $allohelper->search($keyword, $page);
                $data = $result["movie"];
            }// En cas d'erreur.
            catch (\ErrorException $e) {
                // Affichage des informations sur la requête
                $error = "<pre>" . print_r($allohelper->getRequestInfos(), 1) . " </pre><br>";
                // Afficher un message d'erreur.
                $error .= "Erreur " . $e->getCode() . ": " . $e->getMessage();
                return new Response($error);
            }
        }

        return $this->render(
            'MCBundle:Pages:filmsSearch.html.twig',
            array(
                "motsCles" => $keyword,
                "movie" => $data
            )
        );
    }

}
