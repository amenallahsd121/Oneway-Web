<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RelaiController extends AbstractController
{
    #[Route('/relai', name: 'app_relai')]
    public function index(): Response
    {
        return $this->render('relai/index.html.twig', [
            'controller_name' => 'RelaiController',
        ]);
    }
}
