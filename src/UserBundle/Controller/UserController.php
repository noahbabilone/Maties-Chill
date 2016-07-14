<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MCBundle\Entity\Film;
use MCBundle\Entity\Session;
use MCBundle\Entity\Address;
use MCBundle\Form\AddressType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\UserBundle\Model\User;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
            'MCBundle:Profile:addressList.html.twig',
            array(
                "addresses" => $addresses
            )
        );
    }


    /**
     * @Route("/address/form", name="user_address_add")
     * @param Request $request
     * @return Response
     */
    public function addressAddAction(Request $request)
    {
        $user = $this->getUser();
        if (!$user) {
            throw new HttpException(400, "User don't find.");
        }

        $em = $this->getDoctrine()->getManager();

        if ($request->get('id') !== null) {
            $address = $em->getRepository('MCBundle:Address')->find($request->get('id'));
            dump($user);
            die;
            if ($address === null) {
                throw new HttpException(400, "Address don't find.");
            }
        } else {
            $address = new Address();
        }
        $form = $this->createForm(AddressType::class, $address);
        if ($form->handleRequest($request)->isValid()) {
            $em->persist($address);
            $em->flush();
            if ($address->getId() != null) {
                $user->addAddress($address);
                $em->flush();
                return $this->redirectToRoute('user_address');

            }

        }

        return $this->render('MCBundle:Profile:addressAdd.html.twig', array(
            'form' => $form->createView()
        ));
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
     * @Route("/participation", name="user_participation")
     * @param Request $request
     * @return Response
     * @throws HttpException
     */
    public function userParticipationAction(Request $request)
    {
        $user = $this->getUser();
        if (!$user) {
            throw new HttpException(400, "User don't find.");
        }
        $em = $this->getDoctrine()->getManager();


        if ($request->get('view')) {
            $session = $em->getRepository('MCBundle:Session')->find($request->get('view'));

            return $this->render('MCBundle:Profile:participation.html.twig', array(
                "session" => $session,
            ));
        }

        $limitPage = 11;
        $numberPage = 1;

        $result = $em->getRepository('MCBundle:Session')->findParticipant($user->getId());
//        dump($result);
//        die;

        $sessions = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );


        return $this->render('MCBundle:Profile:participation.html.twig', array(
            "sessions" => $sessions,
        ));

    }

    /**
     * @Route("/participants", name="user_participant")
     * @param Request $request
     * @return Response
     * @throws HttpException
     */
    public function userParticipantAction(Request $request)
    {
        $user = $this->getUser();
        if (!$user) {
            throw new HttpException(400, "User don't find.");
        }
        $em = $this->getDoctrine()->getManager();

        $limitPage = 8;
        $numberPage = 1;

        $result = $em->getRepository('MCBundle:Session')->findParticipant($user->getId());
        $participants = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );


        return $this->render('MCBundle:Profile:participants.html.twig', array(
            "participants" => $participants,
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
            $message = "L'adresse " . "(ID: <b>" . $address->getId() . '</b>) ' . $address->getTitle() . ' a été supprimée.';
            //$em->remove($session);
            //$em->flush();
            return new Response(json_encode(array('result' => 'success', 'message' => $message)));
        }
        return new response (json_encode(array('result' => 'error', "message" => "Error: isXmlHttpRequest")));
    }


}
