<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OurPartnersController extends AbstractController
{
    /**
     * @Route("/VosPartennaires", name="app_our_partners")
     */
    public function index(): Response
    {
        return $this->render('our_partners/index.html.twig');
    }
}
