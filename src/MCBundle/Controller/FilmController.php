<?php

namespace MCBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FilmController extends Controller
{
    public function indexAction()
    {
        return $this->render('MCBundle:Default:index.html.twig');
    }
    
    public function filmAllAction(){
        $em = $this->getDoctrine()->getManager();
        $result = $em->getRepository('MCBundle:Film')->findAll();
       $dataFilm = array();
        foreach ($result as $film){ 
            
            $data = array();
            $data['id']=$film->getID();
            $data['ISAN']=$film->getISAN();
            $data['title']=$film->getTitle();
            $data['releaseDate']=$film->getReleaseDate();
            $data['directors']=$film->getDirectors();
            $data['actors']=$film->getActors();
            $data['duration']=$film->getDuration();
            $data['ageLimit']=$film->getAgeLimit();
            $data['pressRating']=$film->getPressRating();
            $data['userRating']=$film->getUserRating();
            $data['link']=$film->getLink();
            $data['description']=$film->getDescription();
            $data['category']=$film->getCategory()->getTitle();
            
            //var_dump($data);
            $dataFilm[]=$data;
            
        }
        return new JSONResponse($dataFilm);
    }
    
     public function filmAllsAction(){
        $em = $this->getDoctrine()->getManager();
        $result = $em->getRepository('MCBundle:Film')->findAll();
        $dataFilm = array();
        foreach ($result as $film){ 
            $data = array();
            $data['id']=$film->getID();
            $data['ISAN']=$film->getISAN();
            $data['title']=$film->getTitle();
            $data['releaseDate']=$film->getReleaseDate();
            $data['directors']=$film->getDirectors();
            $data['actors']=$film->getActors();
            $data['duration']=$film->getDuration();
            $data['ageLimit']=$film->getAgeLimit();
            $data['pressRating']=$film->getPressRating();
            $data['userRating']=$film->getUserRating();
            $data['link']=$film->getLink();
            $data['description']=$film->getDescription();
            $data['category']=$film->getCategory()->getTitle();
            $dataFilm[]=$data;
            
        }
        return $dataFilm;
    }
}
