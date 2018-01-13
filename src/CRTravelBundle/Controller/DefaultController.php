<?php

namespace CRTravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $message = "Welcome to Costa Rican Travel";
        return $this->render('CRTravelBundle:Default:index.html.twig',
            array('message' => $message));
    }
}
