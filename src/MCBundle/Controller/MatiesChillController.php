<?phpnamespace MCBundle\Controller;use MCBundle\Entity\SearchFilm;use Symfony\Bundle\FrameworkBundle\Controller\Controller;use Symfony\Component\HttpFoundation\Response;use Symfony\Component\HttpFoundation\Request;use MCBundle\Form\SearchFilmType;//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;class MatiesChillController extends Controller{    public function indexAction()    {        return $this->render('MCBundle:Pages:index.html.twig');    }    public function sessionAction()    {        return $this->render('MCBundle:Pages:sessions.html.twig');    }    public function filmAction()    {        $data = array();        $allohelper = $this->get("mc_allo_helper");        $motsCles = "The Dark Knight";        $page = 1;        try {            $data = $allohelper->search($motsCles, $page);//            var_dump($data);        }// En cas d'erreur.        catch (\ErrorException $e) {            // Affichage des informations sur la requête            $error = "<pre>" . print_r($allohelper->getRequestInfos(), 1) . " </pre><br>";            // Afficher un message d'erreur.            $error .= "Erreur " . $e->getCode() . ": " . $e->getMessage();            return new Response($error);        }        return $this->render(            'MCBundle:Pages:films.html.twig',            array(                "motsCles" => $motsCles,                "movie" => $data["movie"]            )        );    }    /**     * @param Request $request     * @return Response     */    public function searchFilmAction(Request $request)    {        $search = new SearchFilm;        $formSearch = $this->createForm(new SearchFilmType(), $search);        if ($formSearch->handleRequest($request)->isValid() && !empty($search->getTitle())) {//            $em = $this->getDoctrine()->getManager();            $keyword = $search->getTitle();            $allohelper = $this->get("mc_allo_helper");            $page = 1;            try {                $result = $allohelper->search($keyword, $page);                $data = $result["movie"];//            var_dump($data);            }// En cas d'erreur.            catch (\ErrorException $e) {                // Affichage des informations sur la requête                $error = "<pre>" . print_r($allohelper->getRequestInfos(), 1) . " </pre><br>";                // Afficher un message d'erreur.                $error .= "Erreur " . $e->getCode() . ": " . $e->getMessage();                return new Response($error);            }        }//        }        return $this->render(            'MCBundle:Pages:films.html.twig',            array(                "motsCles" => $keyword,                "movie" => $data            )        );    }    public function searchFieldAction(Request $request)    {        $search = new SearchFilm();        $formSearch = $this->createForm(new SearchFilmType(), $search,            array(                'action' => $this->generateUrl('mc_search_film'),                'method' => 'POST'            )        );//        if ($formSearch->handleRequest($request)->isValid() && !empty($search->getTitle())) {//            $keyword = $search->getTitle();////            //        }        return $this->render('MCBundle:Includes:search.html.twig', array(            'formSearch' => $formSearch->createView(),        ));    }}