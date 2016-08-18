<?php

namespace MCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ComingSoonController extends Controller
{
    /**
     * @Route("/coming_soon", name="coming_soon")
     * @return Response
     */
    public function indexAction()
    {
        $user = $this->getUser();
        if($user) {
            return $this->redirectToRoute('home_page', array(), 301);
        }
        return $this->render('MCBundle::coming_soon.html.twig');
    }

}
