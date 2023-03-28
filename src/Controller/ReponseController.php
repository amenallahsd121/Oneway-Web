<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reclamation;
use App\Entity\Reponse;
use App\Form\ReclamationType;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class ReponseController extends AbstractController
{
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/reponse/reclamation', name: 'app_reclamation')]
    public function indexreclamation(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $reclamationRepository = $entityManager->getRepository(Reclamation::class);
        $queryBuilder = $reclamationRepository->createQueryBuilder('rec');
        
        $query = $reclamationRepository->createQueryBuilder('rec')
            ->leftJoin('rec.reponse', 'rep')
            ->where('rep.id_reponse IS NULL')
            ->getQuery();
        
        $ReclamationNOTReponse  = $query->getResult();
        

        return $this->render('reponse/reclamation.html.twig', [
            'list' => $ReclamationNOTReponse
        ]);
    }

    #[Route('/reponse', name: 'app_reponse')]
    public function indexreponse(): Response
    {
        $data = $this->getDoctrine()->getRepository(Reponse::class)->findAll();
        return $this->render('reponse/reponse.html.twig', [
            'list' => $data   
]);
    }


}
