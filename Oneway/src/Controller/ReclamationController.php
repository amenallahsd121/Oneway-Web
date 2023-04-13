<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reclamation;
use App\Entity\Utilisateur;
use App\Form\ReclamationType;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class ReclamationController extends AbstractController
{

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/reclamation', name: 'app_reclamation')]
    public function index(): Response
    {
        $data = $this->getDoctrine()->getRepository(Reclamation::class)->findAll();
        return $this->render('reclamation/index.html.twig', [
            'list' => $data   
        ]);
    }



    #[Route('/reclamation/add', name: 'add_reclamation')]
    public function addreclamation(ManagerRegistry $doctrine,Request $req): Response {
      
        $em = $doctrine->getManager();
        // em lehi bel base
        $reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class,$reclamation);
        // cree une nouvelle formulaire pour recuperer les recs
        $form->handleRequest($req);
        // valider la rec
        

        if($form->isSubmitted() && $form->isValid()) {
           
        $id=68;
        $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
        $reclamation->setIdUser($utilisateur);
         // affecter le user au rec
        $this->entityManager->persist($reclamation);
        $this->entityManager->flush();
        // mise a jour

            $em->persist($reclamation);
            // affecter la reclamation kemla lel base
            $em->flush();
            // mise a jour lel bd
            return $this->redirectToRoute('app_reclamation');
        }

        return $this->renderForm('reclamation/ajouterreclamation.html.twig',['form'=>$form]);

}

   


#[Route('/reclamation/update/{id}', name: 'update_reclamation')]
    public function update(Request $req, $id) {
      
      $reclamation = $this->getDoctrine()->getRepository(Reclamation::class)->find($id); 
      $form = $this->createForm(ReclamationType::class,$reclamation);
      $form->handleRequest($req);
    if($form->isSubmitted() && $form->isValid()) {
       
    $id=68;
    $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
    $reclamation->setIdUser($utilisateur);
    $this->entityManager->persist($reclamation);
    $this->entityManager->flush();

    ////////////////////////////////////////////////////

        $em = $this->getDoctrine()->getManager();
        $em->persist($reclamation);
        $em->flush();


       
        return $this->redirectToRoute('app_reclamation');
    }

    return $this->renderForm('reclamation/modifierreclamation.html.twig',[
        'form'=>$form]);

}



#[Route('/reclamation/delete/{id}', name: 'delete_reclamation')]
public function delete($id) {
 
 
   
    $data = $this->getDoctrine()->getRepository(Reclamation::class)->find($id); 

      $em = $this->getDoctrine()->getManager();
      $em->remove($data);
      $em->flush();


     

      return $this->redirectToRoute('app_reclamation');
  }





}
