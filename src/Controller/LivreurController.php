<?php

namespace App\Controller;

use App\Entity\Livreur;
use App\Form\LivreurType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LivreurController extends AbstractController
{
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



    #[Route('/livreur/search', name: 'search_livreur')]
    public function search(Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $this->getDoctrine()->getRepository(Livreur::class)->findAll();                             
    
        if ($req->isMethod('POST')) {
            $CIN = $req->request->get('CIN');
            $data = $this->getDoctrine()->getRepository(Livreur::class)->findBy(['cinLivreur' => $CIN]);
        }
    
        return $this->render('livreur/index.html.twig', ['list' => $data]);
    }


    



    }
    
    



