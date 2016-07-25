<?php

namespace MCBundle\Controller;

use MCBundle\Entity\Film;
use MCBundle\Entity\Seance;

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
    public function indexAction()
    {
        $user = $this->getUser();
        if ($user) {
            $userSeance = $this->get('session');
            $em = $this->getDoctrine()->getManager();
            $seances = $em->getRepository('MCBundle:Seance')->findMySeance($user->getId());

            $userSeance->set('nbSeance', COUNT($seances));
            $nbParticipant = 0;
            foreach ($seances as $seance) {
                $nbParticipant += COUNT($seance['participants']);
            }

            $userSeance->set('nbParticipant', $nbParticipant);

        }
        return $this->render('MCBundle:Pages:index.html.twig');
    }


    /**
     * @Route("/search", name="search_")
     * Get all seances
     * @param Request $request
     * @return Response
     */
    public function searchAction(Request $request)
    {
        //$limitPage = 16;
        $numberPage = 1;
        $data = array();
        $arrShow = array("10", "15","20", "25", "30");
        $data["shows"] = $arrShow;
        $arrSort = array("1" => "Date Croissante", "2" => "Date Décroissante", "3" => "Prix croissante", "4" => "Prix Dé&eacute;croissant");
        $data["sorts"] = $arrSort;
        $arrViewing = array("vf" => "VF", "vo" => "VO", "vostf" => "VOSTFR", "VOST" => "VOST", "vf_3D" => "VF en 3D", "vo_3D" => "VO en 3D");
        $data["viewings"] = $arrViewing;

        $em = $this->getDoctrine()->getManager();

        $keyword = ($request->get('q') !== null && !empty($request->get('q'))) ? $request->get('q') : null;

        $limitPage = ($request->get('show') !== null && in_array($request->get('show'), $arrShow)) ? $request->get('show') : 15;
        $order = ($request->get('order') !== null && 0 < intval($request->get('order'))
            && intval($request->get('order')) <= COUNT($arrSort)) ? $request->get('order') : null;
        $typeView = ($request->get('view') !== null && !empty($request->get('view'))) ? $request->get('view') : null;
        $location = ($request->get('location') !== null && !empty($request->get('location'))) ? $request->get('location') : null;
        
        $result = $em->getRepository('MCBundle:Seance')->searchSeance($keyword, $limitPage, $order, $typeView, $location);

        $seances = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );
        $data['seances'] = $seances;
        return $this->render('MCBundle:Pages:search.html.twig', $data);
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
