<?phpnamespace MCBundle\Controller;use MCBundle\Entity\SearchFilm;use MCBundle\Entity\Session;use Symfony\Bundle\FrameworkBundle\Controller\Controller;use Symfony\Component\HttpFoundation\Response;use Symfony\Component\HttpFoundation\Request;use MCBundle\Form\SearchFilmType;//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;class MatiesChillController extends Controller{    /**     * @return Response     */    public function indexAction()    {        return $this->render('MCBundle:Pages:index.html.twig');    }    public function sessionAction()    {        $em = $this->getDoctrine()->getManager();        $sessions = $em->getRepository('MCBundle:Session')->findByFilm();        return $this->render(            'MCBundle:Pages:films.html.twig',            array(                "sessions" => $sessions            )        );    }    public function sessionByFilmAction($idFilm)    {        $em = $this->getDoctrine()->getManager();        $sessions = $em->getRepository('MCBundle:Session')->findByFilm($idFilm);        $film = $em->getRepository('MCBundle:Film')->find($idFilm);                return $this->render(            'MCBundle:Pages:films.html.twig',            array(                "sessions" => $sessions,                "film" => $film,            )        );    }    public function getFilmAllocineAction($code)    {        $allocine = $this->get("mc_allocine");        $result = $allocine->get($code);        return $this->render('MCBundle:Pages:viewFilm.html.twig', array(            "result" => json_decode($result),        ));    }    public function filmAction()    {        $em = $this->getDoctrine()->getManager();        $films = $em->getRepository('MCBundle:Film')->findAll();        return $this->render(            'MCBundle:Pages:films.html.twig',            array(                "films" => $films            )        );    }//    public function searchAllocineFilmAction($keyword, Request $request)//    {//        $allocine = $this->get("mc_allocine");//        $result = $allocine->search($keyword);//        $limitPage = 10;//        $numberPage = 1;//        $result = json_decode($result);//        $movies = $this->get('knp_paginator')->paginate(//            $result,//            $request->query->get('page', $numberPage),//            $limitPage//        );////        return $this->render(//            'MCBundle:Pages:filmsSearch.html.twig',//            array(//                "motsCles" => $keyword,//                "movies" => $movies//            )//        );//    }    public function searchAllocineFilmAction($keyword)    {        $allocine = $this->get("mc_allocine");        $result = $allocine->search($keyword);        return $this->render(            'MCBundle:Pages:filmsSearch.html.twig',            array(                "motsCles" => $keyword,                "movies" => json_decode($result)            )        );    }    /**     * @param Request $request     * @return Response     */    public function searchFilmAction(Request $request)    {        $keyword = "";        $data = array();        $search = new SearchFilm;        $formSearch = $this->createForm(new SearchFilmType(), $search);        if ($formSearch->handleRequest($request)->isValid() && !empty($search->getTitle())) {            $keyword = $search->getTitle();            $allohelper = $this->get("mc_allo_helper");            $page = 1;            try {                $result = $allohelper->search($keyword, $page);                $data = $result["movie"];            }// En cas d'erreur.            catch (\ErrorException $e) {                // Affichage des informations sur la requête                $error = "<pre>" . print_r($allohelper->getRequestInfos(), 1) . " </pre><br>";                // Afficher un message d'erreur.                $error .= "Erreur " . $e->getCode() . ": " . $e->getMessage();                return new Response($error);            }        }        return $this->render(            'MCBundle:Pages:filmsSearch.html.twig',            array(                "motsCles" => $keyword,                "movie" => $data            )        );    }    public function searchFieldAction(Request $request)    {        $search = new SearchFilm();        $formSearch = $this->createForm(new SearchFilmType(), $search,            array(                'action' => $this->generateUrl('mc_search_film'),                'method' => 'GET'            ));        if ($formSearch->handleRequest($request)->isValid() && !empty($search->getTitle())) {            return $this->redirect($this->generateUrl('mc_film_search_allocine', array("keyword" => $search->getTitle())));        }        return $this->render('MCBundle:Includes:search.html.twig', array(            'formSearch' => $formSearch->createView(),        ));    }    public function addSessionAction()    {        $em = $this->getDoctrine()->getManager();        $session = new Session();        $session->setDate(new \DateTime("2016-3-21"));        $session->setTypeView("VO");        $session->setDescription("Test Description");        $session->setContribution("Bouteille de cocoa");        $session->setPrice(6);        $session->setMaxPlace(10);        $address = $em->getRepository('MCBundle:Address')->find(2);        $session->setAddress($address);        $material = $em->getRepository('MCBundle:Material')->find(3);        $session->addMaterial($material);        $material = $em->getRepository('MCBundle:Material')->find(1);        $session->addMaterial($material);        $material = $em->getRepository('MCBundle:Material')->find(2);        $session->addMaterial($material);        $modality = $em->getRepository('MCBundle:Modality')->find(3);        $session->setModality($modality);        $film = $em->getRepository('MCBundle:Film')->find(1);        $session->setFilm($film);        $user = $em->getRepository('UserBundle:User')->find(1);        $session->setUser($user);        $em->persist($session);        $em->flush();        return new Response("Add");    }}