<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MCBundle\Entity\Film;
use MCBundle\Entity\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class BackOfficeController extends Controller
{

    /**
     * Get all sessions
     * @param Request $request
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

        return $this->render('UserBundle:Default:dashboard.html.twig', array(
            "sessions" => $sessions
        ));
    }


    /**
     * @param Request $request
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
            $message = 'La séance ' . '(ID: <b>' . $session->getId() .'</b>) '. $session->getFilm()->getTitle(). ' a été supprimée.';
            //$em->remove($session);
            //$em->flush();
            return new Response(json_encode(array('result' => 'Success', 'message' => $message)));
        }
        return new response (json_encode(array('result' => 'Error!',"message"=>"Error: isXmlHttpRequest")));
    }

    
}
