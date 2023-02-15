<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class SpellController extends AbstractController
{
    #[Route('/spells', name: 'app_spells')]

    
    public function index()
    {
       
        return $this->render('home/spells.html.twig', [
            'controller_name' => 'SpellController',
        ]);
    }
}
