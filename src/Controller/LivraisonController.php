<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Colis;
use App\Entity\Livraison;
use Doctrine\ORM\EntityManagerInterface;


class LivraisonController extends AbstractController
{
    #[Route('/livraison/colis', name: 'app_livraison_colis')]
    public function indexcolis(): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $colisRepository = $entityManager->getRepository(Colis::class);
        $queryBuilder = $colisRepository->createQueryBuilder('c');


        $query = $colisRepository->createQueryBuilder('c')
        ->leftJoin('c.livraison', 'l')
        ->where('l.id IS NULL')
        ->getQuery();
    
    $ColisNotLivraison = $query->getResult();

        return $this->render('livraison/colis.html.twig', [
            'list' => $ColisNotLivraison
        ]);
    }


    #[Route('/livraison', name: 'app_livraison')]
    public function indexlivraison(): Response
    {
        return $this->render('livraison/livraison.html.twig', [
            'controller_name' => 'LivraisonController',
        ]);
    }
}
