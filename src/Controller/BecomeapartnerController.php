<?php

namespace App\Controller;

use App\Entity\Hall;
use App\Form\HallBecomeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class BecomeapartnerController extends AbstractController
{
    /**
     * @Route("/devenirpartenaire", name="app_becomeapartner")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hasher): Response
    {
        $hall = new Hall();
        $form = $this->createForm(HallBecomeType::class,$hall);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $hall = $form->getData();
            $password = $hasher->hashPassword($hall,$hall->getPassword());
            $hall->setPassword($password);
            $entityManager->persist($hall);
            $entityManager->flush();
        }
        return $this->render('becomeapartner/index.html.twig',[
            'form'=> $form->createView()
        ]);
    }
}