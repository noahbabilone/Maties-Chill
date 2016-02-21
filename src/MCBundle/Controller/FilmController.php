<?php

namespace MCBundle\Controller;

use MCBundle\Entity\Film;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class FilmController extends Controller
{
    public function indexAction()
    {
        return $this->render('MCBundle:Default:index.html.twig');
    }

    public function allMovieAction()
    {
        $em = $this->getDoctrine()->getManager();
        $result = $em->getRepository('MCBundle:Film')->findAll();
        $dataFilm= array();
        foreach ($result as $film) {
            $dataFilm[] = $this->parserMovie($film);
        }

        return new JSONResponse($dataFilm);
        //        return $dataFilm;

    }

    public function addMovieAction(Request $request)
    {
        $film = new Film();
        $form = $this->createForm(new AdsEditType(), $film);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();


        }
        return new JsonResponse('Add ******');

    }

    public function removeMovieAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository('MCBundle:Film')->find($id);
        if (null === $film) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }
//            $em->remove($film);
//            $em->flush();
        return new JsonResponse('Supprimé ' . $id);

    }

    public function getMovieAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $film = $em->getRepository('MCBundle:Film')->find($id);
        if (null === $film) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }
        $dataFilm = $this->parserMovie($film);
        return new JSONResponse($dataFilm);

    }

    public function parserMovie($film)
    {
        $data = array();
        if ($film) {
            $data['id'] = $film->getID();
            $data['ISAN'] = $film->getISAN();
            $data['title'] = $film->getTitle();
            $data['releaseDate'] = $film->getReleaseDate();
            $data['directors'] = $film->getDirectors();
            $data['actors'] = $film->getActors();
            $data['duration'] = $film->getDuration();
            $data['ageLimit'] = $film->getAgeLimit();
            $data['pressRating'] = $film->getPressRating();
            $data['userRating'] = $film->getUserRating();
            $data['link'] = $film->getLink();
            $data['description'] = $film->getDescription();
            $data['category'] = $film->getCategory()->getTitle();
        }
        return $data;
    }


}
