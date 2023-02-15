<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class EnnemiController extends AbstractController
{
    #[Route('/ennemis', name: 'app_ennemis')]

    
    public function index()
    {
       
        return $this->render('home/ennemis.html.twig', [
            'controller_name' => 'EnnemiController',
        ]);
    }
}
