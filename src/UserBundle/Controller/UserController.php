<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MCBundle\Entity\Film;
use MCBundle\Entity\Seance;
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
     * Get all seances
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
     * @Route("/seances", name="user_seances")
     * @param Request $request
     * @return Response
     * @throws HttpException
     */
    public function userSeancesAction(Request $request)
    {
        $user = $user = $this->getUser();
        if (!$user) {
            throw new HttpException(400, "User don't find.");
        }
        $em = $this->getDoctrine()->getManager();

        $idSeance = $request->get('view');
        if ($idSeance) {
            $results = $em->getRepository('MCBundle:Seance')->findOneSeanceUser($user->getId(),$idSeance);
            $participants = $em->getRepository('MCBundle:Participant')->findParticipantOneSeance($user->getId(),$idSeance);
            
           // dump($results);
           // die();
            return $this->render('MCBundle:Profile:seanceView.html.twig', array(
                "results" => $results,
                "participants" => $participants,
            ));
        }

        $limitPage = 11;
        $numberPage = 1;

        $entity = $em->getRepository('MCBundle:Seance')->findMySeance($user->getId()); 
        
        $results = $this->get('knp_paginator')->paginate(
            $entity,
            $request->query->get('page', $numberPage),
            $limitPage
        );


        return $this->render('MCBundle:Profile:seances.html.twig', array(
            "results" => $results,
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
            $seance = $em->getRepository('MCBundle:Seance')->find($request->get('view'));

            return $this->render('MCBundle:Profile:participation.html.twig', array(
                "seance" => $seance,
            ));
        }

        $limitPage = 11;
        $numberPage = 1;

        $result = $em->getRepository('MCBundle:Participant')->findParticipation($user->getId());
//        dump($result);
//        die;
        $participates = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );


        return $this->render('MCBundle:Profile:participation.html.twig', array(
            "participates" => $participates,
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

        $result = $em->getRepository('MCBundle:Participant')->findParticipant($user->getId());
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
    public function removeSeanceAction(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $id = $request->get('id');
            $address = $em->getRepository('MCBundle:Address')->find($id);
            if (null === $address) {
                throw new NotFoundHttpException("L'adresse (ID: " . $id . ") n'existe pas.");
            }
            $message = "L'adresse " . "(ID: <b>" . $address->getId() . '</b>) ' . $address->getTitle() . ' a été supprimée.';
            //$em->remove($seance);
            //$em->flush();
            return new Response(json_encode(array('result' => 'success', 'message' => $message)));
        }
        return new response (json_encode(array('result' => 'error', "message" => "Error: isXmlHttpRequest")));
    }


}
