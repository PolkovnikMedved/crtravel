<?php

namespace CRTravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;


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

    /**
     *  @Route("/images/{image}", name = "serve_file")
     */
    public function getPicture($image){
        $filePath = $this->getParameter('pictures_directory').'/'.$image;
        return $this->file($filePath, $image ,ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
