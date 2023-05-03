<?php

namespace App\Controller;

use App\Entity\Opportinute;
use App\Form\OpportinuteType;
use App\Repository\OpportinuteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class OpportinuteController extends AbstractController
{

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }



    #[Route('/opportinute', name: 'app_opportinute')]
    public function index(): Response
    {
        $data = $this->getDoctrine()->getRepository(Opportinute::class)->findAll();
        return $this->render('\opportinute\index.html.twig', [
            'list' => $data   
        ]);
    }

    #[Route('/opportinute/add', name: 'add_opportinute')]
    public function addevent(ManagerRegistry $doctrine,Request $req): Response {
      
        $em = $doctrine->getManager();
        $Opportinute = new Opportinute();
        $form = $this->createForm(OpportinuteType::class,$Opportinute);
        $form->handleRequest($req);
        

        if($form->isSubmitted() && $form->isValid()) {
          

            $em->persist($Opportinute);
            $em->flush();
            return $this->redirectToRoute('app_opportinute');
        }

        return $this->renderForm('opportinute/ajouteropportinute.html.twig',['form'=>$form]);

}

#[Route('/opportinute/update/{id}', name: 'update_opportinute')]
    public function update(Request $req, $id) {
      
      $Opportinute = $this->getDoctrine()->getRepository(Opportinute::class)->find($id); 
      $form = $this->createForm(OpportinuteType::class,$Opportinute);
      $form->handleRequest($req);
    if($form->isSubmitted() && $form->isValid()) {
       


        $em = $this->getDoctrine()->getManager();
        $em->persist($Opportinute);
        $em->flush();


        
        return $this->redirectToRoute('app_opportinute');
    }

    return $this->renderForm('opportinute/modifier.html.twig',[
        'form'=>$form]);

}

#[Route('/opportinute/delete/{id}', name: 'delete_opportinute')]
public function delete($id) {
 
 
   
    $data = $this->getDoctrine()->getRepository(Opportinute::class)->find($id); 

      $em = $this->getDoctrine()->getManager();
      $em->remove($data);
      $em->flush();


      

      return $this->redirectToRoute('app_opportinute');
  }

//   #[Route('/calendar/opp', name: 'app_evenement_opp')]
//   public function calendaropp(OpportinuteRepository $opp): Response
//   {
//       $opprtunits= $opp->findAll();
//       $rdvs = [];

//       foreach($opprtunits as $o){
//         $rdvs[] = [
         
//             'start' => $o->getDate()->format('Y-m-d'),
            
//             'title' => $o->getDepart(),
            
//              'color' => 'red', 
             
         
//         ];
//     }

//     $donnes = json_encode($rdvs);

      
    
//       return $this->renderForm('\evenement\calendar.html.twig',[
//         'form'=>$donnes]);
//   }




}
