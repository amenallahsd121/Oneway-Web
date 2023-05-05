<?php

namespace App\Controller;

use App\Repository\OffreRepository;
use App\Repository\OpportinuteRepository;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalendarController extends AbstractController
{
    /**
     * @Route("/calendar", name="app_calendar")
     */
    public function index(OffreRepository $calendar): Response
    {
        $offres = $calendar->findAll();
        $rdvs = [];
        foreach($offres as $offre){
            $rdvs[] = [
                'id' => $offre->getIdoffre(),
                'title' => $offre->getDescriptionoffre(),
                'start' => $offre->getDateoffre()->format('Y-m-d'),
                'end' => $offre->getDatesortieoffre()->format('Y-m-d'),

            ];
        }
        $data = json_encode($rdvs);
        return $this->render('offre/showoffrefront.html.twig', compact('data'));
    }
   
}