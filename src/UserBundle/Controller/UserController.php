<?php

namespace UserBundle\Controller;

use MCBundle\Entity\Participant;
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
     * @Route("/profile/address", name="user_address")
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
     * @Route("/seance/participate/{seance}", name="user_participate")
     * @param Request $request
     * @param $seance
     * @return Response
     */
    public function participate(Request $request, $seance)
    {


        if (null !== $this->getUser() || null !== $seance) {
            $em = $this->getDoctrine()->getManager();
            $participant = $em->getRepository('MCBundle:Participant')->findBy(array(
                    "user" => $this->getUser()->getId(),
                    "seance" => $seance,
                )
            );

            $seance = $em->getRepository('MCBundle:Seance')->find($seance);
            if (count($participant) == 0 && $seance->getCreator()->getId() !== $this->getUser()->getId()) {

                $participant = new Participant();
                $participant->setUser($this->getUser());
                $participant->setSeance($seance);
                $participant->setDisable(1);
                $em->persist($participant);
                $em->flush();
                $response = "success";
                $message = "Votre inscription à la séance à été prise en compte, Veuillez finaliser votre commande.";
                $participation = $em->getRepository('MCBundle:Participant')->findParticipation($this->getUser()->getId());
                $this->get('session')->set('COUNT_PARTICIPATION', COUNT($participation));

            } else {
                $message = "Vous êtes déjà inscrit à cette séance.";
                $response = "Error";
            }
            
        } else {

            $response = "Error";
            if ($seance == null) {
                $message = "La séance demandée n'existe plus.";
            } else {
                $message = "Vous dévez être connecté.";
            }
        }

        $request->getSession()->set('message', $message);
        $request->getSession()->set('response', $response);

        return $this->redirectToRoute('seances_view', array('slug' => $seance->getId()), 301);

    }


    /**
     * @Route("/profile/address/form", name="user_address_add")
     * @param Request $request
     * @return Response
     */
    public
    function addressAddAction(Request $request)
    {
        $user = $this->getUser();
        if (!$user) {
            throw new HttpException(400, "User don't find.");
        }

        $em = $this->getDoctrine()->getManager();

        if ($request->get('id') !== null) {
            $address = $em->getRepository('MCBundle:Address')->find($request->get('id'));
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
     * @Route("/profile/seances", name="user_seances")
     * @param Request $request
     * @return Response
     * @throws HttpException
     */
    public
    function userSeancesAction(Request $request)
    {
        $user = $user = $this->getUser();
        if (!$user) {
            throw new HttpException(400, "User don't find.");
        }
        $em = $this->getDoctrine()->getManager();

        $idSeance = $request->get('view');
        if ($idSeance) {
            $results = $em->getRepository('MCBundle:Seance')->findOneSeanceUser($user->getId(), $idSeance);
            $participants = $em->getRepository('MCBundle:Participant')->findParticipantOneSeance($user->getId(), $idSeance);

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
     * @Route("/profile/participations", name="user_participation")
     * @param Request $request
     * @return Response
     * @throws HttpException
     */
    public
    function userParticipationAction(Request $request)
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
     * @Route("/profile/participants", name="user_participant")
     * @param Request $request
     * @return Response
     * @throws HttpException
     */
    public
    function userParticipantAction(Request $request)
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
     * @Route("/profile/user/address/remove", name="user_address_remove",  options = {"expose"=true})
     * @return response
     * @throws NotFoundHttpException
     */
    function removeAddressAction(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $id = $request->get('id');
            $address = $em->getRepository('MCBundle:Address')->find($id);
            if (null === $address) {
                throw new NotFoundHttpException("L'adresse (ID: " . $id . ") n'existe pas.");
            }
            $message = "L'adresse " . "(ID: <b>" . $address->getId() . '</b>) ' . $address->getTitle() . ' a été supprimée.';
            $em->remove($address);
            $em->flush();
            $request->getSession()->set('COUNT_ADDRESS', COUNT($this->getUser()->getAddress()));

            return new Response(json_encode(array(
                        'result' => 'success',
                        'message' => $message,
                        'count' => $request->getSession()->get('COUNT_ADDRESS'),
                    )
                )
            );
        }
        return new response (json_encode(array('result' => 'error', "message" => "Error: isXmlHttpRequest")));
    }


    /**
     * @param Request $request
     * @Route("/profile/participation/remove", name="user_remove_participation",  options = {"expose"=true})
     * @return response
     * @throws NotFoundHttpException
     */
    function removeParticipationAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {

            if (null == $this->getUser()) {
                throw new NotFoundHttpException("L'Utilisateur n'existe pas.");
            }
            $em = $this->getDoctrine()->getManager();
            $participant = $em->getRepository('MCBundle:Participant')->findBy(array(
                    "user" => $this->getUser()->getId(),
                    "seance" => $request->get('id'),
                )
            );

            if (null === $participant[0]) {
                throw new NotFoundHttpException("L'Participation dont la séance ID: " . $request->get('id') . " et User ID: " . $request->getUser()->getId() . " n'existe pas.");
            }

            $message = "Vous avez été retiré de la séance:" . $participant[0]->getSeance()->getFilm()->getTitle() . " - " . $participant[0]->getSeance()->getTypeView();
            $participant[0]->setDisable(false);

            $em->remove($participant);
            $em->flush();
            $participation = $em->getRepository('MCBundle:Participant')->findParticipation($this->getUser()->getId());
            $request->getSession()->set('COUNT_PARTICIPATION', COUNT($participation));

            return new Response(json_encode(array(
                        'result' => 'success',
                        'message' => $message,
                        'count' => $request->getSession()->get('COUNT_PARTICIPATION'),

                    )
                )
            );
        }
        return new response (json_encode(array('result' => 'error', "message" => "Error: isXmlHttpRequest")));

    }

    /**
     * @param Request $request
     * @Route("/profile/participant/remove", name="user_remove_participant",  options = {"expose"=true})
     * @return response
     * @throws NotFoundHttpException
     */
    function removeParticipantAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {

            if (null == $this->getUser()) {
                throw new NotFoundHttpException("L'Utilisateur n'existe pas.");
            }
            $em = $this->getDoctrine()->getManager();


            $participant = $em->getRepository('MCBundle:Participant')->findBy(array(
                    "user" => $request->get('participant'),
                    "seance" => $request->get('id'),
                )
            );

            if (null === $participant[0]) {
                throw new NotFoundHttpException("L'Participation dont la séance ID: " . $request->get('id') . " et User ID: " . $request->getUser()->getId() . " n'existe pas.");
            }

            $message = ucfirst($participant[0]->getUser()->getUsername()) . " a été retiré de la séance:" . $participant[0]->getSeance()->getFilm()->getTitle() . " - " . $participant[0]->getSeance()->getTypeView();
            $participant[0]->setDisable(false);
            $em->remove($participant);
            $em->flush();

            $participants = $em->getRepository('MCBundle:Participant')->findParticipant($this->getUser()->getId());
            $request->getSession()->set('COUNT_PARTICIPANT', COUNT($participants));

            return new Response(json_encode(array(
                        'result' => 'success',
                        'message' => $message,
                        'count' => $request->getSession()->get('COUNT_PARTICIPANT'),


                    )
                )
            );
        }
        return new response (json_encode(array('result' => 'error', "message" => "Error: isXmlHttpRequest")));

    }
}
