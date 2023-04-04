<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Utilisateur;
use App\Entity\Participation;
use App\Form\EvenementType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class ParticipationController extends AbstractController
{


    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }




    #[Route('/participation/evenement', name: 'app_participation_evenement')]
    public function index(): Response
    {
        $data = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        return $this->render('\participation\index.html.twig', [
            'list' => $data   
        ]);
       
    }


    #[Route('/participation/add/{ide}', name: 'add_participation')]
    public function addparticipation($ide , ManagerRegistry $doctrine,Request $req): Response {
      
        $em = $doctrine->getManager();
        $Participation = new Participation();
       
        

       
        $id=68;
        $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
        $event = $this->entityManager->getRepository(Evenement::class)->find($ide);
        $Participation->setId_user($utilisateur);
        $Participation->setid_Event($event);


        $this->entityManager->persist($Participation);
        $this->entityManager->flush();

            $em->persist($Participation);
            $em->flush();
            return $this->redirectToRoute('app_participation_evenement');
        }

        

        #[Route('/participation/delete/{ide}', name: 'delete_participation')]
        public function delete($ide) {
         
         
           
            $data = $this->getDoctrine()->getRepository(Participation::class)->find($ide); 
        
              $em = $this->getDoctrine()->getManager();
              $em->remove($data);
              $em->flush();
        
        
          
        
              return $this->redirectToRoute('app_participation_evenement');
          }


      
}

