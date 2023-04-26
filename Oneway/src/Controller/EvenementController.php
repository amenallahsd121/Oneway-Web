<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementController extends AbstractController
{

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }





    


    #[Route('/evenement', name: 'app_evenement')]
    public function index(EntityManagerInterface $entityManager, Request $request, EvenementRepository $offreRepo, PaginatorInterface $paginator ): Response
    {
        
        
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

  
    


}
