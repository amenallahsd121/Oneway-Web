<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Maintenance;
use App\Form\MaintenanceType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use SebastianBergmann\Environment\Console;

class MaintenanceController extends AbstractController
{
    #[Route('/maintenance', name: 'app_maintenance')]
    public function index(): Response
    {


        $data = $this->getDoctrine()->getRepository(Maintenance::class)->findAll();
        return $this->render('\maintenance\index.html.twig', [
            'list' => $data
        ]);
    }


    #[Route('/maintenance/add', name: 'add_maintenance')]
    public function addmaintenance(ManagerRegistry $doctrine, Request $req): Response
    { {

            $em = $doctrine->getManager();
            $maintenance = new Maintenance();
            $form = $this->createForm(MaintenanceType::class, $maintenance);
            $form->handleRequest($req);



            if ($form->isSubmitted() && $form->isValid()) {

                $em->persist($maintenance);
                $em->flush();
                return $this->redirectToRoute('app_maintenance');
            }

            return $this->renderForm('maintenance/ajoutermaintenance.html.twig', ['form' => $form]);
        }
    }




    #[Route('/maintenance/update/{id}', name: 'update_maintenance')]
    public function update(Request $req, $id)
    {

        $maintenance = $this->getDoctrine()->getRepository(Maintenance::class)->find($id);
        $form = $this->createForm(MaintenanceType::class, $maintenance);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {



            $em = $this->getDoctrine()->getManager();
            $em->persist($maintenance);
            $em->flush();


            $this->addFlash('notice', 'maintenance à jours');

            return $this->redirectToRoute('app_maintenance');
        }

        return $this->renderForm('maintenance/modifiermaintenance.html.twig', [
            'form' => $form
        ]);
    }





    #[Route('/maintenance/delete/{id}', name: 'delete_maintenance')]
    public function delete($id)
    {



        $data = $this->getDoctrine()->getRepository(Maintenance::class)->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();


        $this->addFlash('notice', 'Maintenance Supprimé');

        return $this->redirectToRoute('app_maintenance');
    }
}
