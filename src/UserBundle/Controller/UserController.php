<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MCBundle\Entity\Film;
use MCBundle\Entity\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\UserBundle\Model\User;


class UserController extends Controller
{

    /**
     * @Route("/address", name="user_address")
     * Get all sessions
     * @param Request $request
     * @return Response
     * @throws HttpException
     */
    public function addressUserAction(Request $request)
    {
        $user = $this->getUser();
        if (!$user) {
            throw new HttpException(400, "User don't find.");
        }

        $limitPage = 6;
        $numberPage = 1;

        $addresses = $this->get('knp_paginator')->paginate(
            $user->getAddress(),
            $request->query->get('page', $numberPage),
            $limitPage
        );
        return $this->render(
            'MCBundle:Profile:addressUser.html.twig',
            array(
                "addresses" => $addresses
            )
        );
    }


    /**
     * @Route("/seances", name="user_session")
     * @param Request $request
     * @return Response
     * @throws HttpException
     */
    public function userSessionsAction(Request $request)
    {
        $user = $user = $this->getUser();
        if (!$user) {
            throw new HttpException(400, "User don't find.");
        }
        $em = $this->getDoctrine()->getManager();


        if ($request->get('view')) {
            $session = $em->getRepository('MCBundle:Session')->find($request->get('view'));
            
            return $this->render('MCBundle:Profile:viewSessionUser.html.twig', array(
                "session" => $session,
            ));
        }

        $limitPage = 11;
        $numberPage = 1;

        $result = $em->getRepository('MCBundle:Session')->findByCreator($user->getId());

        $sessions = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );


        return $this->render('MCBundle:Profile:sessionsUser.html.twig', array(
            "sessions" => $sessions,
        ));

    }

    
    /**
     * @param Request $request
     * @Route("/user/remove", name="user_address_remove",  options = {"expose"=true})
     * @return response
     * @throws NotFoundHttpException
     */
    public function removeSessionAction(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $id = $request->get('id');
            $address = $em->getRepository('MCBundle:Address')->find($id);
            if (null === $address) {
                throw new NotFoundHttpException("L'adresse (ID: " . $id . ") n'existe pas.");
            }
            $message = "L'adresse ". "(ID: <b>" . $address->getId() . '</b>) ' . $address->getTitle() . ' a été supprimée.';
            //$em->remove($session);
            //$em->flush();
            return new Response(json_encode(array('result' => 'success', 'message' => $message)));
        }
        return new response (json_encode(array('result' => 'error', "message" => "Error: isXmlHttpRequest")));
    }


}
