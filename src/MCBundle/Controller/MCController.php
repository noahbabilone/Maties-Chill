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
    public function indexAction()
    {
        $user = $this->getUser();
        if ($user) {
            $userSession=$this->get('session');
            $em = $this->getDoctrine()->getManager();
            $sessions = $em->getRepository('MCBundle:Session')->findByCreator($user->getId());
            
            $userSession->set('nbSession', COUNT($sessions)); 
            $nbParticipant= 0;
            foreach ($sessions as $session){
                $nbParticipant+= COUNT($session->getParticipant());
            }
            
            $userSession->set('nbParticipant', $nbParticipant); 
         
        }
        return $this->render('MCBundle:Pages:index.html.twig');
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

    public function searchFieldAction(Request $request)
    {
        $search = new SearchFilm();
        $formSearch = $this->createForm(new SearchFilmType(), $search,
            array(
                'action' => $this->generateUrl('mc_search_field'),
                'method' => 'GET'

            ));
        if ($formSearch->handleRequest($request)->isValid() && !empty($search->getTitle())) {
            return $this->redirect($this->generateUrl('mc_film_search_allocine', array("keyword" => $search->getTitle())));
        }
        return $this->render('MCBundle:Includes:search.html.twig', array(
            'formSearch' => $formSearch->createView(),
        ));
    }

}
