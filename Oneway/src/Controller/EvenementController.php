<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class EvenementController extends AbstractController
{

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }





    


    #[Route('/evenement', name: 'app_evenement')]
    public function index(): Response
    {
        $data = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        return $this->render('\evenement\index.html.twig', [
            'list' => $data   
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
