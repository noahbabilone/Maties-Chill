<?php

namespace MCBundle\Controller;

use MCBundle\Entity\Film;

use MCBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class SessionController extends Controller
{

    /**
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
     * Get all sessions for each Id Film
     * @param $idFilm
     * @return Response
     */
    public function sessionByFilmAction($idFilm)
    {
        $em = $this->getDoctrine()->getManager();
        $sessions = $em->getRepository('MCBundle:Session')->findByFilm($idFilm);
        $film = $em->getRepository('MCBundle:Film')->find($idFilm);

        return $this->render(
            'MCBundle:Pages:films.html.twig',
            array(
                "sessions" => $sessions,
                "film" => $film,
            )
        );
    }

    public function addSessionAction()
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
