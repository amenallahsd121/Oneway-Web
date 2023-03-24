<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivreurController extends AbstractController
{
    #[Route('/livreur', name: 'app_livreur')]
    public function index(): Response
    {
        return $this->render('livreur/index.html.twig', [
            'controller_name' => 'LivreurController',
        ]);
    }
}
