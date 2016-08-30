<?php

namespace MCBundle\Controller;

use MCBundle\Entity\Comment;
use MCBundle\Entity\Film;
use MCBundle\Entity\Seance;
use MCBundle\Entity\Address;
use MCBundle\Entity\Material;
use MCBundle\Entity\Genre;

use MCBundle\Form\SeanceType;
use MCBundle\Form\MaterialType;
use MCBundle\Form\AddressType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use FOS\UserBundle\Model\User;


class SeanceController extends Controller
{
    /**
     * @Route("/seances/{action}", name="seances_action")
     * Get all seances
     * @param Request $request
     * @param $action
     * @return Response
     */
    public function indexAction(Request $request, $action)
    {

        ////die;
        $numberPage = 1;
        $data = array();
        $arrShow = array("10", "15", "20", "25", "30");
        $data["shows"] = $arrShow;
        $arrSort = array("1" => "Date Croissante", "2" => "Date Décroissante", "3" => "Prix croissante", "4" => "Prix Dé&eacute;croissant");
        $data["sorts"] = $arrSort;
        $arrViewing = array("vf" => "VF", "vo" => "VO", "vostf" => "VOSTFR", "VOST" => "VOST", "vf_3D" => "VF en 3D", "vo_3D" => "VO en 3D");
        $data["viewings"] = $arrViewing;

        $em = $this->getDoctrine()->getManager();

        $limitPage = ($request->get('show') !== null && in_array($request->get('show'), $arrShow)) ? $request->get('show') : 15;
        $order = ($request->get('order') !== null && 0 < intval($request->get('order'))
            && intval($request->get('order')) <= COUNT($arrSort)) ? $request->get('order') : null;
        $typeView = ($request->get('view') !== null && !empty($request->get('view'))) ? $request->get('view') : null;
        $location = ($request->get('location') !== null && !empty($request->get('location'))) ? $request->get('location') : null;


        if ($action == 'all') {
            $result = $em->getRepository('MCBundle:Seance')->seance($action, null, $order, $typeView, $location);
            $data["pageTitle"] = 'Toutes';
        } else if ($action == 'next') {
            $result = $em->getRepository('MCBundle:Seance')->seance($action, null, $order, $typeView, $location);
            $data["pageTitle"] = 'Prochaines séances';

        } else if ($action == 'paying') {

            $result = $em->getRepository('MCBundle:Seance')->seance($action, null, $order, $typeView, $location);
            $data["pageTitle"] = 'Séances gratuites';

        } else if ($action == 'free') {
            $result = $em->getRepository('MCBundle:Seance')->seance($action, null, $order, $typeView, $location);

            $data["pageTitle"] = 'Séances gratuites';
        } else {
            $result = array(); // not found
            $data["pageTitle"] = 'Aucune séance';

        }
        $data['results'] = $this->get('knp_paginator')->paginate(
            $result,
            $request->query->get('page', $numberPage),
            $limitPage
        );
        return $this->render('MCBundle:Pages:seancesAction.html.twig', $data);
    }

    /**
     * @Route("/seances", name="seances_home")
     * Get all seances
     * @param Request $request
     * @return Response
     */
    public function seanceHomeAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $data = array();

        $limit = 8;
        //Prochaines
        $data['nextSeances'] = $em->getRepository('MCBundle:Seance')->nextSeances($limit);

        //Films récentss
        $data['recentMoviesSeances'] = $em->getRepository('MCBundle:Seance')->recentMoviesSeance($limit);

        //Payantes
        $data['seancesPaying'] = $em->getRepository('MCBundle:Seance')->seancePaying($limit);

        //Gratuites
        $data['seancesFrees'] = $em->getRepository('MCBundle:Seance')->seanceFree($limit);

        //Top users
        //$topUsers = $em->getRepository('MCBundle:Seance')->seanceFree(10);
        return $this->render('MCBundle:Pages:seances.html.twig', $data);
    }


    /**
     * @Route("/seances/view/{slug}", name="seances_view")
     * @param Request $request
     * @param $slug
     * @return Response
     */
    public function viewSeancesAction(Request $request, $slug)
    {
        $em = $this->getDoctrine()->getManager();
        $result = $em->getRepository('MCBundle:Seance')->seanceID($slug);
        $seance = null;
        $participants = null;
        $data = array();


        if ($result != null && key_exists("seance", $result[0]) && key_exists("participants", $result[0])) {
            $data["seance"] = $result[0]["seance"];
//            $data["comments"] = $em->getRepository('MCBundle:Comment')->findBy(
//                array("seance" => $data["seance"]->getId(),)
//            );
//
//            dump($data);
//            die;
            $data["participants"] = $result[0]["participants"];

            if (null !== $this->getUser() || null !== $data["seance"]) {
                $participant = $em->getRepository('MCBundle:Participant')->findBy(array(
                        "user" => $this->getUser()->getId(),
                        "seance" => $data["seance"]->getId(),
                    )
                );

                $data["isParticipant"] = (count($participant) > 0) ? true : false;
//                dump($participant);
//                dump($data);
//                die;
            }
        }

        if ($request->getSession()->has('message') && $request->getSession()->has('response')) {
            $data['message'] = $request->getSession()->get('message');
            $data['response'] = $request->getSession()->get('response');
            $request->getSession()->remove('message');
            $request->getSession()->remove('response');
        }

        return $this->render('MCBundle:Pages:seanceView.html.twig', $data);

    }

    /**
     * Get all seances for each Id Film
     * @param $idFilm
     * @return Response
     */
    public function seanceByFilmAction($idFilm)
    {
        $em = $this->getDoctrine()->getManager();
        $seances = $em->getRepository('MCBundle:Seance')->find($idFilm);
        $film = $em->getRepository('MCBundle:Film')->find($idFilm);

        return $this->render(
            'MCBundle:Pages:films.html.twig',
            array(
                "seances" => $seances,
                "film" => $film,
            )
        );
    }

    /**
     * @param Request $request
     * @Route("/seance/remove", name="seances_remove",  options = {"expose"=true})
     * @return response
     * @throws NotFoundHttpException
     */
    public function removeSeanceAction(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $id = $request->get('id');
            $seance = $em->getRepository('MCBundle:Seance')->find($id);
            if (null === $seance) {
                throw new NotFoundHttpException("La séance (ID: " . $id . ") n'existe pas.");
            }
            $message = "La séance " . "(<b>" . $seance->getFilm()->getTitle() . " -  " . $seance->getTypeView() . "</b>)  a été supprimée.";
            //$em->remove($seance);
            //$em->flush();
            $seances = $em->getRepository('MCBundle:Seance')->findMySeance(
                $this->getUser()->getId());
            $request->getSession()->set('COUNT_SEANCE', COUNT($seances));


            return new Response(json_encode(array(
                        'result' => 'success',
                        'message' => $message,
                        'count' => $request->getSession()->get('COUNT_SEANCE'),
                    )
                )
            );
        }
        return new response (json_encode(array('result' => 'error', "message" => "Error: isXmlHttpRequest")));
    }


    /**
     * Get all seances
     * @param Request $request
     * @Route("/seances/add/form", name="seances_add")
     * @return Response
     */
    public function addSeanceAction(Request $request)
    {
        $seance = new Seance();
        $form = $this->createForm(new SeanceType(), $seance);
        $formMaterial = $this->createForm(new MaterialType(), new Material());
        $formAddress = $this->createForm(new AddressType(), new Address());

        if ($form->handleRequest($request)->isValid() && $seance->getFilmId()) {
            $em = $this->getDoctrine()->getManager();
            $film = $em->getRepository('MCBundle:Film')->findOneBy(array('ISAN' => $seance->getFilmId()));
            if (!$film) {
                // $em = $this->getDoctrine()->getManager();
                $cine = $this->get("mc_allocine");
                $result = $cine->get($seance->getFilmId());
                $data = json_decode($result);
                // dump($data);

                $film = $this->parserMovie($data->movie);
                if ($film->getISAN()) {
                    $em->persist($film);
                    $em->flush();
                    $film = $em->getRepository('MCBundle:Film')->find($film->getId());
                }
            }
            $seance->setFilm($film);
            //$creator = $user = $this->get('security.context')->getToken()->getUser();
            $creator = $user = $this->getUser();
            $seance->setCreator($creator);

            $em->persist($seance);
            $em->flush();

            $request->getSession()->set('add-seance', true);
            return $this->redirectToRoute('seances_view', array('slug' => $seance->getId()), 301);

        }

        return $this->render('MCBundle:Pages:seanceAdd.html.twig', array(
            'form' => $form->createView(),
            'formMaterial' => $formMaterial->createView(),
            'formAddress' => $formAddress->createView(),
        ));
    }


    /**
     * @param Request $request
     * @Route("/search_Film", name="search_film_ajax",  options = {"expose"=true})
     * @return response
     * @throws NotFoundHttpException
     */
    public function searchFilmAjaxAction(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
//            $em = $this->getDoctrine()->getManager();
            $keyword = $request->get('search');
            $count = ($request->get('count') == null) ? 10 : $request->get('count');
            $data = array();
//            $films = $em->getRepository('MCBundle:Film')->searchDB($keyword);
//            foreach ($films as $film) {
//                $data[] = array("title" => $film->getTitle(), "code" => $film->getISAN());
//            }

            $allocine = $this->get("mc_allocine");
            $result = $allocine->search($keyword, $page = 1, $count = $count);
            $movies = json_decode($result);

            //dump($movies);
            //die;
            if (count($movies) > 0) {
                if (array_key_exists('feed', $movies) && array_key_exists('movie', $movies->feed)) {
//                    dump($movies);
//                    die;

                    foreach ($movies->feed->movie as $movie) {
                        $title = null;
                        if (array_key_exists('title', $movie))
                            $title = $movie->title;

                        if ($title == null && array_key_exists('originalTitle', $movie))
                            $title = $movie->originalTitle;

                        if (array_key_exists('poster', $movie) && array_key_exists('href', $movie->poster)) {
                            $poster = $movie->poster->href;
                        }

                        if (isset($title) && !empty($title) && isset($poster) && !empty($poster)) {

                            $search["code"] = $movie->code;
                            $search["title"] = $title;
                            $search["poster"] = $poster;

                            if (array_key_exists('castingShort', $movie)) {
                                if (array_key_exists('directors', $movie->castingShort))
                                    $search["directors"] = $movie->castingShort->directors;
                            }

                            if (array_key_exists('castingShort', $movie)) {
                                if (array_key_exists('actors', $movie->castingShort))
                                    $search["actors"] = $movie->castingShort->actors;
                            }

                            if (array_key_exists('release', $movie))
                                $search["date"] = $movie->release->releaseDate;

                            if (array_key_exists('link', $movie))
                                if (array_key_exists('href', $movie->link[0]))
                                    $search["allocine"] = $movie->link[0]->href;

                            if (array_key_exists('synopsisShort', $movie))
                                $search["synopsis"] = $movie->synopsisShort;

                            $data[] = $search;
                        }
                    }
                }
            }
            return new Response(json_encode(array('response' => 'success', 'result' => $data)));
        }
        return new response (json_encode(array('response' => 'error', "result" => "Error: isXmlHttpRequest")));
    }


    public function addSeance()
    {
        $em = $this->getDoctrine()->getManager();
        $seance = new Seance();
        $seance->setDate(new \DateTime("2016-6-25"));
        $seance->setTypeView("VOSTFR");
        $seance->setDescription("Le DKS dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur. ");
        $seance->setContribution("Chips, soda, coca ou tout ce que vous voulez apporter ");
        $seance->setPrice(6);
        $seance->setMaxPlace(5);

        $address = $em->getRepository('MCBundle:Address')->find(1);
        $seance->setAddress($address);

        $material = $em->getRepository('MCBundle:Material')->find(3);
        $seance->addMaterial($material);
        $material = $em->getRepository('MCBundle:Material')->find(1);
        $seance->addMaterial($material);
        $material = $em->getRepository('MCBundle:Material')->find(2);
        $seance->addMaterial($material);

        $modality = $em->getRepository('MCBundle:Modality')->find(2);
        $seance->setModality($modality);
        $film = $em->getRepository('MCBundle:Film')->find(2);
        $seance->setFilm($film);
        $user = $em->getRepository('UserBundle:User')->find(1);
        $seance->setCreator($user);

//        $em->persist($seance);
//        $em->flush();
        return new Response("Add");
    }


    public function parserMovie($movie)
    {
        $film = new Film();
        if (!empty($movie)) {
            $em = $this->getDoctrine()->getManager();
            $film->setISAN($movie->code);
            $film->setTitle($movie->title);
            if (array_key_exists('originalTitle', $movie))
                $film->setOriginalTitle($movie->originalTitle);

            if (array_key_exists('release', $movie))
                $film->setReleaseDate($movie->release->releaseDate);

            if (array_key_exists('castingShort', $movie))
                $film->setDirectors($movie->castingShort->directors);

            if (array_key_exists('castingShort', $movie))
                $film->setActors($movie->castingShort->actors);
            if (array_key_exists('nationality', $movie)) {
                $nationality = "";
                foreach ($movie->nationality as $data) {
                    $nationality .= $this->get("mc_allocine")->getObject($data);
                }
                $film->setNationality($nationality);
            }
            if (array_key_exists('runtime', $movie))
                $film->setRuntime($movie->runtime);
            $film->setAgeLimit(10);

            if (array_key_exists('statistics', $movie) && array_key_exists('pressRating', $movie->statistics))
                $film->setPressRating($movie->statistics->pressRating);
            if (array_key_exists('statistics', $movie) && array_key_exists('userRating', $movie->statistics))
                $film->setUserRating($movie->statistics->userRating);

            if (array_key_exists('link', $movie)) {
                if (!empty($movie->link)) {
                    $film->setLink($movie->link[0]->href);
                }
            }
            if (array_key_exists('trailerEmbed', $movie))
                $film->setTrailer($movie->trailerEmbed);
            if (array_key_exists('poster', $movie) && array_key_exists('href', $movie->poster))
                $film->setPoster($movie->poster->href);
            if (array_key_exists('synopsis', $movie))
                $film->setSynopsis($movie->synopsis);
            if (array_key_exists('synopsisShort', $movie))
                $film->setSynopsisShort($movie->synopsisShort);
            if (array_key_exists('genre', $movie)) {
                foreach ($movie->genre as $data) {
                    $genre = $this->get("mc_allocine")->getObject($data);
                    $objGenre = $em->getRepository('MCBundle:Genre')->findOneByTitle($genre);
                    if (!$objGenre) {
                        $objGenre = new Genre();
                        $objGenre->setTitle($genre);
                        $em->persist($objGenre);
                        $em->flush();
                        $objGenre = $em->getRepository('MCBundle:Genre')->findOneByTitle($genre);
                    }
                    $film->addGenre($objGenre);
                }
            }

        }
        return $film;
    }

    /**
     * @param Request $request
     * @Route("/seances/comment/form", name="seance_comment",  options = {"expose"=true})
     * @return response
     * @throws NotFoundHttpException
     */
    public function commentAjaxAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $data = array();
            if ($this->getUser() == null) {
                return new Response(json_encode(array('response' => 'error', 'result' => "Vous devez être connecté.")));
            }


            $seance = $request->get('seance');
            $em = $this->getDoctrine()->getManager();
            $seanceOb = $em->getRepository('MCBundle:Seance')->find($seance);

            if ($seanceOb == null) {
                return new Response(json_encode(array('response' => 'error', 'result' => "Séance non trouvée.")));
            }

            $message = $request->get('message');
            $comment = new Comment();
            $comment->setUser($this->getUser());
            $comment->setSeance($seanceOb);
            $comment->setMessage($message);
            $comment->setDisable(false);
            $comment->setDate(new \DateTime());

            dump($comment);
            die;
//            foreach ($films as $film) {
//                $data[] = array("title" => $film->getTitle(), "code" => $film->getISAN());
//            }


            return new Response(json_encode(array('response' => 'success', 'result' => $data)));
        }
        return new response (json_encode(array('response' => 'error', "result" => "Error: isXmlHttpRequest")));

    }


}
