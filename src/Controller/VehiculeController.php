<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use SebastianBergmann\Environment\Console;


class VehiculeController extends AbstractController
{
    #[Route('/vehicule', name: 'app_vehicule')]
    public function index(): Response
    {


        $data = $this->getDoctrine()->getRepository(Vehicule::class)->findAll();
        return $this->render('\vehicule\index.html.twig', [
            'list' => $data
        ]);
    }


    #[Route('/vehicule/add', name: 'add_vehicule')]
    public function addvehicule(ManagerRegistry $doctrine, Request $req): Response
    { {

            $em = $doctrine->getManager();
            $vehicule = new Vehicule();
            $form = $this->createForm(VehiculeType::class, $vehicule);
            $form->handleRequest($req);



            if ($form->isSubmitted() && $form->isValid()) {

                $em->persist($vehicule);
                $em->flush();
                return $this->redirectToRoute('app_vehicule');
            }

            return $this->renderForm('vehicule/ajoutervehicule.html.twig', ['form' => $form]);
        }
    }




    // #[Route('/vehicule/update/{id}', name: 'update_vehicule')]
    // public function update(Request $req, $id)
    // {

    //     $vehicule = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);
    //     $form = $this->createForm(VehiculeType::class, $vehicule);
    //     $form->handleRequest($req);
    //     if ($form->isSubmitted() && $form->isValid()) {



    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($vehicule);
    //         $em->flush();


    //         $this->addFlash('notice', 'Vehicule à jours');

    //         return $this->redirectToRoute('app_Vehicule');
    //     }

    //     return $this->renderForm('vehicule/modifiervehicule.html.twig', [
    //         'form' => $form
    //     ]);
    // }





    // #[Route('/vehicule/delete/{id}', name: 'delete_vehicule')]
    // public function delete($id)
    // {



    //     $data = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);

    //     $em = $this->getDoctrine()->getManager();
    //     $em->remove($data);
    //     $em->flush();


    //     $this->addFlash('notice', 'Vehicule Supprimé');

    //     return $this->redirectToRoute('app_vehicule');
    // }
}
