<?php

namespace App\Controller;

use App\Entity\Maintenance;
use App\Form\MaintenanceType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




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

    #[Route('/maintenance/excel/{id}', name: 'excel_maintenance')]
    public function exportExcel(Request $req, $id): Response
    {
        $maintenance = $this->getDoctrine()->getRepository(Maintenance::class)->find($id);


        $etat =  $maintenance-> getetat();
        $nomSosRep =  $maintenance-> getnomSosRep();
        $idVehicule =  $maintenance-> getidVehicule();
        $vehicule = $idVehicule-> getmatricule();

        // Create a new Spreadsheet object and populate it with the data
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setCellValue('A1', 'Etat');
        $worksheet->setCellValue('A2', 'nom de la sociéte');
        $worksheet->setCellValue('A3', 'Matricule');
        $worksheet->setCellValue('B1', $etat);
        $worksheet->setCellValue('B2', $nomSosRep);
        $worksheet->setCellValue('B3', $vehicule);

        // Create a new Xlsx writer and write the Spreadsheet object to it
        $writer = new Xlsx($spreadsheet);
        $writer->save('maintenance.xlsx');

        // Send the Excel file as a download to the user
        $response = new BinaryFileResponse('maintenance.xlsx');
        $response->setContentDisposition(\Symfony\Component\HttpFoundation\ResponseHeaderBag::DISPOSITION_ATTACHMENT, 'maintenance.xlsx');
        return $response;
    }
}
