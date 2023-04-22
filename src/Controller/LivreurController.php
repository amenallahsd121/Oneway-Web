<?php

namespace App\Controller;

use App\Entity\Livreur;
use App\Form\LivreurType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Yectep\Bundle\DatatableBundle\DataTable\DataTableFactory;



class LivreurController extends AbstractController
{



    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
       
    }







    #[Route('/livreur', name: 'app_livreur')]
    public function index(): Response
    {


        $data = $this->getDoctrine()->getRepository(Livreur::class)->findAll();
        return $this->render('\livreur\index.html.twig', [
            'list' => $data
        ]);
    }


    #[Route('/livreur/add', name: 'add_livreur')]
    public function addcolis(ManagerRegistry $doctrine, Request $req): Response
    {

        $em = $doctrine->getManager();
        $Livreur = new Livreur();
        $form = $this->createForm(LivreurType::class, $Livreur);
        $form->handleRequest($req);


        if ($form->isSubmitted() && $form->isValid()) {


            $em->persist($Livreur);
            $em->flush();
            return $this->redirectToRoute('app_livreur');
        }

        return $this->renderForm('livreur/ajouterlivreur.html.twig', ['form' => $form]);
    }



    #[Route('/livreur/update/{id}', name: 'update_livreur')]
    public function update(Request $req, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $livreur = $this->getDoctrine()->getRepository(Livreur::class)->find($id);

        
        $form = $this->createForm(LivreurType::class, $livreur);
        $form->handleRequest($req);


        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($livreur);
            $em->flush();
            return $this->redirectToRoute('app_livreur');
        }

        return $this->renderForm('livreur/modifier.html.twig', [
            'form' => $form
        ]);
    }





    #[Route('/livreur/delete/{id}', name: 'delete_livreur')]
    public function delete($id)
    {



        $data = $this->getDoctrine()->getRepository(Livreur::class)->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();


       

        return $this->redirectToRoute('app_livreur');
    }




    #[Route('/livreur/search', name: 'livreur_search')]
    public function searchLivreurAction(Request $request)
{
    $name = $request->request->get('search_input');
    $livreurs = $this->getDoctrine()->getRepository(Livreur::class)->findBy(['name' => $name]);

    $livreurArray = [];
    foreach ($livreurs as $livreur) {
        $livreurArray[] = [
            'id' => $livreur->getId(),
            'nom' => $livreur->getLastname(),
            'prenom' => $livreur->getName(),
            
        ];
    }

    return new JsonResponse($livreurArray);
}


    }
    
    



