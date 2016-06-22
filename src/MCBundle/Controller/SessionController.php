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


class SessionController extends Controller
{
    /**
     * @Route("/seances", name="session_home")
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
            'MCBundle:MC:sessions.html.twig',
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

        return $this->render('MCBundle:MC:viewSession.html.twig', array(
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
            $creator = $user = $this->get('security.context')->getToken()->getUser();
            $session->setCreator($creator);
            $em->persist($session);
            $em->flush();

            $request->getSession()->set('add-session', true);
            return $this->redirectToRoute('list_sessions', array(), 301);

        }

        return $this->render('MCBundle:MC:add-sessions.html.twig', array(
            'form' => $form->createView(),
            'formMaterial' => $formMaterial->createView(),
            'formAddress' => $formAddress->createView(),
        ));
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
