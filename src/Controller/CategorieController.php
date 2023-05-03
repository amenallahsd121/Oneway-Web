<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use SebastianBergmann\Environment\Console;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(Request $request, PaginatorInterface $paginator): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Categorie::class);
        $query = $repository->createQueryBuilder('c')
        ->orderBy('c.idCategorie', 'DESC');
          
            
        $data = $paginator->paginate(
            $query, // Requête contenant les données à paginer (ici notre requête custom)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3 // Nombre de résultats par page
        );
        
        return $this->render('\categorie\index.html.twig', [
            'list' => $data   
        ]);
       
            
    }



    #[Route('/categorie/add', name: 'add_categorie')]
    public function addcolis(ManagerRegistry $doctrine,Request $req): Response {
      
        $em = $doctrine->getManager();
        $Categorie = new Categorie();
        $form = $this->createForm(CategorieType::class,$Categorie);
        $form->handleRequest($req);
        

        if($form->isSubmitted() && $form->isValid()) {
          

            $em->persist($Categorie);
            $em->flush();
            return $this->redirectToRoute('app_categorie');
        }

        return $this->renderForm('categorie/ajoutercategorie.html.twig',['form'=>$form]);

}



#[Route('/categorie/update/{id}', name: 'update_categorie')]
    public function update(Request $req, $id) {
      
      $categorie = $this->getDoctrine()->getRepository(Categorie::class)->find($id); 
      $form = $this->createForm(CategorieType::class,$categorie);
      $form->handleRequest($req);
    if($form->isSubmitted() && $form->isValid()) {
       


        $em = $this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->flush();


        $this->addFlash('notice' , 'Categorie à jours');

        return $this->redirectToRoute('app_categorie');
    }

    return $this->renderForm('categorie/modifiercategorie.html.twig',[
        'form'=>$form]);

}





#[Route('/categorie/delete/{id}', name: 'delete_categorie')]
public function delete($id) {
 
 
   
    $data = $this->getDoctrine()->getRepository(Categorie::class)->find($id); 

      $em = $this->getDoctrine()->getManager();
      $em->remove($data);
      $em->flush();


      $this->addFlash('notice' , 'Categorie Supprimé');

      return $this->redirectToRoute('app_categorie');
  }

}
