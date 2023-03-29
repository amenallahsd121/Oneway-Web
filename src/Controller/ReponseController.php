<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reclamation;
use App\Entity\Reponse;
use App\Form\ReponseType;
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


    #[Route('/reponse/reclamation', name: 'app_reclamation_reponse')]
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


    #[Route('/reponse/add/{id}', name: 'add_reponse')]
    public function addreponse($id,ManagerRegistry $doctrine,Request $req): Response {
    {
        
        $em = $doctrine->getManager();
        $reponse = new Reponse();
        $form = $this->createForm(ReponseType::class,$reponse);
        $form->handleRequest($req);
        

        if($form->isSubmitted() && $form->isValid()) {
            $reclamation = $this->entityManager->getRepository(Reclamation::class)->find($id);
            $reponse->setReclamation($reclamation);
            $this->entityManager->persist($reponse);
            $this->entityManager->flush();

            /////////////////////////////////////////////////////////////////

            $em->persist($reponse);
            $em->flush();
            return $this->redirectToRoute('app_reponse');
        }

        return $this->renderForm('reponse/ajouterreponse.html.twig',['form'=>$form]);
    }
}




#[Route('/reponse/update/{id}', name: 'update_reponse')]
    public function update(Request $req, $id) {
      
      $reponse = $this->getDoctrine()->getRepository(Reponse::class)->find($id); 
      $form = $this->createForm(ReponseType::class,$reponse);
      $form->handleRequest($req);
    if($form->isSubmitted() && $form->isValid()) {
       


        $em = $this->getDoctrine()->getManager();
        $em->persist($reponse);
        $em->flush();


        return $this->redirectToRoute('app_reponse');
    }

    return $this->renderForm('reponse/modifierreponse.html.twig',[
        'form'=>$form]);

}





#[Route('/reponse/delete/{id}', name: 'delete_reponse')]
public function delete($id) {
 
 
   
    $data = $this->getDoctrine()->getRepository(Reponse::class)->find($id); 

      $em = $this->getDoctrine()->getManager();
      $em->remove($data);
      $em->flush();


 

      return $this->redirectToRoute('app_reponse');
  }




}
