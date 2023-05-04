<?php

namespace App\Controller;


use App\Entity\Evenement;
use App\Entity\Opportinute;

use Symfony\Component\HttpFoundation\JsonResponse;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OpportinuteRepository;
use App\Entity\Offre;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }


    #[Route('/api/{id}/edit', name: 'app_api_edit', methods: ['POST'])]
    public function majEvent(?Opportinute $cal,$id, Request $request): Response
    {
        $donnees = json_decode($request->getContent());
        $calendar = $this->getDoctrine()->getRepository(Opportinute::class)->find($id);

        if(
            isset($donnees->start) && !empty($donnees->start)

        ){

            $code = 200;


            $d=new DateTime($donnees->start);
           // $formattedDate = $d->format('Y-m-d');
            $calendar->setDate($d);

            $em = $this->getDoctrine()->getManager();
            $em->persist($calendar);
            $em->flush();

            // On retourne le code
        }else{
            // Les données sont incomplètes
            return new Response('Données incomplètes', 404);
        }
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}