<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Evenement;
use App\Entity\Utilisateur;
use App\Form\EvenementType;
use App\Entity\Participation;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Contracts\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class ParticipationController extends AbstractController
{


    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/participation', name: 'app_participation')]
    public function indexparticipation(SessionInterface $session  ): Response
    {
        $data = $this->getDoctrine()->getRepository(Participation::class)->findAll();
       

        return $this->render('\participation\participation.html.twig', [
            'list' => $data   
        ]);
    }



    #[Route('/participation/evenement', name: 'app_participation_evenement')]
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator,SessionInterface $session ): Response
    {
        
        $list= $entityManager->getRepository(Evenement::class)->findAll();
        $session->start();
        $userId = $_SESSION['user_id'];
        $pagination = $paginator->paginate( $list , $request->query->getInt('page', 1 ), 3);  
        return $this->render('\participation\index.html.twig', [
            
            'list' => $pagination ,
             'userId' => $userId,
        ]);
       
    }


    #[Route('/participation/add/{ide}', name: 'add_participation')]
    public function addparticipation($ide , ManagerRegistry $doctrine,Request $req,SessionInterface $session): Response {
      
        $em = $doctrine->getManager();
        $Participation = new Participation();
       
        

       
        $session->start();
        $id = $_SESSION['user_id'];
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
          #[Route('/participationn/delete/{idt}', name: 'delete_participationn')]
          public function delete2($idt) {
           
           
             
              $data = $this->getDoctrine()->getRepository(Participation::class)->find($idt); 
          
                $em = $this->getDoctrine()->getManager();
                $em->remove($data);
                $em->flush();
          
          
            
          
                return $this->redirectToRoute('app_participation');
            }

            #[Route('/events/data', name: 'event_data')]
    public function usersData()
    {
        return $this->render('evenement/data.html.twig');
    }

 
    #[Route('/events/data/download/{ident}', name: 'event_data_download')]
    public function EvenDataDownload($ident)
    {
        $data = $this->getDoctrine()->getRepository(Evenement::class)->find($ident);
        // On définit les options du PDF
        $pdfOptions = new Options();
        // Police par défaut
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true);

        // On instancie Dompdf
        $dompdf = new Dompdf($pdfOptions);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($context);

        // On génère le html
        $html = $this->renderView('participation/download.html.twig' , [
            'list' => $data   
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // On génère un nom de fichier
        $fichier = 'Event-data-ID'.$ident.'.pdf';

        // On envoie le PDF au navigateur
        $dompdf->stream($fichier, [
            'Attachment' => true
        ]);

        return new Response();
    }



      
}

