<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Form\ColisType;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ColisController extends AbstractController
{


    
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }




    

    #[Route('/colis', name: 'app_colis')]
    public function index(): Response
    {
        dump("Afficher");
        $data = $this->getDoctrine()->getRepository(Colis::class)->findAll();
        return $this->render('colis/index.html.twig', [
            'list' => $data   
        ]);
    }






    #[Route('/colis/add', name: 'add_colis')]
    public function addcolis(ManagerRegistry $doctrine,Request $req): Response {
        dump("Ajouter");
        $em = $doctrine->getManager();
        $colis = new Colis();
        $form = $this->createForm(ColisType::class,$colis);
        $form->handleRequest($req);
        

        if($form->isSubmitted() && $form->isValid()) {
           
        $id=68;
        $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
        $colis->setUtilisateur($utilisateur);
        $this->entityManager->persist($colis);
        $this->entityManager->flush();

            $em->persist($colis);
            $em->flush();
            return $this->redirectToRoute('app_colis');
        }

        return $this->renderForm('colis/ajoutercolis.html.twig',['form'=>$form]);

}






#[Route('/colis/update/{id}', name: 'update_colis')]
    public function update(Request $req, $id) {
      dump("OK");
      $colis = $this->getDoctrine()->getRepository(Colis::class)->find($id); 
      $form = $this->createForm(ColisType::class,$colis);
      $form->handleRequest($req);
    if($form->isSubmitted() && $form->isValid()) {
       
    $id=68;
    $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
    $colis->setUtilisateur($utilisateur);
    $this->entityManager->persist($colis);
    $this->entityManager->flush();

    ////////////////////////////////////////////////////

        $em = $this->getDoctrine()->getManager();
        $em->persist($colis);
        $em->flush();


        $this->addFlash('notice' , 'Colis à jours');

        return $this->redirectToRoute('app_colis');
    }

    return $this->renderForm('colis/modifier.html.twig',[
        'form'=>$form]);

}



#[Route('/colis/delete/{id}', name: 'delete_colis')]
public function delete($id) {
 
 
    dump("Hello");
    $data = $this->getDoctrine()->getRepository(Colis::class)->find($id); 

      $em = $this->getDoctrine()->getManager();
      $em->remove($data);
      $em->flush();


      $this->addFlash('notice' , 'Colis Supprimé');

      return $this->redirectToRoute('app_colis');
  }



}


