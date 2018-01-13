<?php

namespace CRTravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/admin/dashboard", name = "dashboard")
     */
    public function indexAction()
    {
        $message = "Dashboard";
        return $this->render('CRTravelBundle:dashboard:index.html.twig', array(
            'message' => $message
        ));
    }
}
