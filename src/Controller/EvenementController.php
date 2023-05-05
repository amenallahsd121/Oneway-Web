<?php

namespace App\Controller;

use DateTime;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Entity\Affectationopcolis;
use App\Entity\Opportinute;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OpportinuteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class EvenementController extends AbstractController
{

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }





    


    #[Route('/evenement', name: 'app_evenement')]
    public function index(EntityManagerInterface $entityManager, Request $request, EvenementRepository $offreRepo, PaginatorInterface $paginator,SessionInterface $session ): Response
    {
        $session->start();
        $t = $_SESSION['user_type']  ;
        $username = $_SESSION['username'] ?? null;
        if ($username === null) {

            echo "<script>alert('Login first');</script>";
            return $this->redirectToRoute("check_login");
        }
         else if($t == "Admin")
        {
           // echo "<script>alert('this user is  $username ');</script>";
           
        }
        else {
            echo "<script>alert('Logout first');</script>";
            return $this->redirectToRoute("front_edit");
        }
        
        // $data = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        $list= $entityManager->getRepository(Evenement::class)->findAll();
        $pagination = $paginator->paginate( $list , $request->query->getInt('page', 1 ), 3);  
        return $this->render('\evenement\index.html.twig', [
            
            'list' => $pagination
        ]);
    }


    #[Route('/qrcode/{id_event}', name: 'app_evenement_qrcode')]
    public function index3( Evenement $evenements ): Response
    {
        
        
      
        return $this->render('\evenement\data.html.twig', [
            
            'evenement' => $evenements
        ]);
    }

    #[Route('/evenement/add', name: 'add_evenement')]
    public function addevent(ManagerRegistry $doctrine,Request $req): Response {
      
        $em = $doctrine->getManager();
        $Evenement = new Evenement();
        $form = $this->createForm(EvenementType::class,$Evenement);
        $form->handleRequest($req);
        

        if($form->isSubmitted() && $form->isValid()) {
          

            $em->persist($Evenement);
            $em->flush();
            return $this->redirectToRoute('app_evenement');
        }

        return $this->renderForm('evenement/ajouterevenement.html.twig',['form'=>$form]);

}



#[Route('/evenement/update/{id}', name: 'update_evenement')]
    public function update(Request $req, $id) {
      
      $Evenement = $this->getDoctrine()->getRepository(Evenement::class)->find($id); 
      $form = $this->createForm(EvenementType::class,$Evenement);
      $form->handleRequest($req);
    if($form->isSubmitted() && $form->isValid()) {
       


        $em = $this->getDoctrine()->getManager();
        $em->persist($Evenement);
        $em->flush();


        
        return $this->redirectToRoute('app_evenement');
    }

    return $this->renderForm('evenement/modifier.html.twig',[
        'form'=>$form]);

}

#[Route('/evenement/delete/{id}', name: 'delete_evenement')]
public function delete($id) {
 
 
   
    $data = $this->getDoctrine()->getRepository(Evenement::class)->find($id); 

      $em = $this->getDoctrine()->getManager();
      $em->remove($data);
      $em->flush();


      

      return $this->redirectToRoute('app_evenement');
  }

  
  #[Route('/calendar/event', name: 'app_evenement_calendar')]
  public function calendarEvent(EvenementRepository $evenment, OpportinuteRepository $opp): Response
  {
      $events= $evenment->findAll();
      $ops= $opp->findAll();
      $rdvs = [];
      $rdvs1 = [];
      foreach($events as $event){
        $rdvs[] = [
             'id' => $event->getIdEvent(),
            'start' => $event->getDateDebutEvent()->format('Y-m-d') ,
            'end' => $event->getDateFinEvent()->format('Y-m-d'),
            'title' => $event->getNom(),
            
             'color' => 'red', 
             'borderColor' => 'bleu',
             'textColor' => 'bleu',
             'url' => '../qrcode/'.$event->getIdEvent() .' ',
             'backgroundColor' => 'bleu',
         
        ];
    }
    foreach($ops as $o){
        $rdvs1[] = [
          
            'start' => $o->getDate()->format('Y-m-d'),
            'id' =>  $o->getIdOpp(),
            'title' => $o->getDepart(),
            // 'daysOfWeek'=> $o->getHeurDepart(),
            // 'endTime'=> $o->getHeurArrivee(),
            'color' => 'red',
            
         
        ];
    }


    $data = json_encode($rdvs);
    $dataop = json_encode($rdvs1);
      
    
      return $this->render('\evenement\calendar.html.twig', compact('data','dataop'));
  }

  #[Route('/calendar/event/Admin', name: 'app_evenement_calendarAdmin', methods: ['GET'])]
  public function calendarEventBack(EvenementRepository $evenment, OpportinuteRepository $opp): Response
  {
      $events= $evenment->findAll();
      $ops= $opp->findAll();
      $rdvs = [];
      $rdvs1 = [];
      foreach($events as $event){
        $rdvs[] = [
             'id' => $event->getIdEvent(),
            'start' => $event->getDateDebutEvent()->format('Y-m-d') ,
            'end' => $event->getDateFinEvent()->format('Y-m-d'),
            'title' => $event->getNom(),
            
             'color' => 'red', 
             'borderColor' => 'bleu',
             'textColor' => 'bleu',
             'url' => '../qrcode/'.$event->getIdEvent() .' ',
             'backgroundColor' => 'bleu',
         
        ];
    }
    foreach($ops as $o){
        $rdvs1[] = [
          
            'start' => $o->getDate()->format('Y-m-d'),
            'id' =>  $o->getIdOpp(),
            'title' => $o->getDepart(),
            // 'daysOfWeek'=> $o->getHeurDepart(),
            // 'endTime'=> $o->getHeurArrivee(),
            'color' => 'red',
            
         
        ];
    }


    $data = json_encode($rdvs);
    $dataop = json_encode($rdvs1);
      
    
     // return $this->render('\evenement\cal.html.twig', compact('data','dataop'));
      return $this->render('evenement/cal.html.twig', [
        'data'=>$data,
         'dataop' => $dataop, 
         
         
     ]);
  }

  


         #[Route("/participation/search", name:"participation_search")]
        public function search(Request $request , EntityManagerInterface $entityManager,PaginatorInterface $paginator )
        {   
           

            $searchQuery = $request->query->get('q');

            

            $queryBuilder = $entityManager->createQueryBuilder()
                ->select('e')
                ->from(Evenement::class, 'e')
                ->where('e.nom LIKE :query')
                ->orWhere('e.description LIKE :query')
                ->orWhere('e.awards LIKE :query')
                ->setParameter('query', '%'.$searchQuery.'%');
            
            $list = $queryBuilder->getQuery()->getResult();

         
                $pagination = $paginator->paginate( $list , $request->query->getInt('page', 1 ), 3);  

            return $this->render('participation/search.html.twig', [
               
                'list' => $pagination,
                'search_query' => $searchQuery
                
            ]);
        }






        


}
