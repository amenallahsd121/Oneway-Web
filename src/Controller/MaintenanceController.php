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
use PHPExcel;
use PHPExcel_IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




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
        // récupérer les données à exporter
        // $data = [
        //     ['Etat', 'Nom de la societe', 'Matricule'],
        //     ['Bonne etat', 'auto plus' , '165TUN6845'],
            
        //         ];

       // $maintenance = $this->entityManager->getRepository(Maintenance::class)->find($id);
        

        // ->data('Les details de votre maintenance sont   : ' . $etat . $nomSosRep .  $idVehicule . $vehicule )


        // créer un nouvel objet PHPExcel
        // $objPHPExcel = new PHPExcel();

        // $etat = $maintenance->getEtat();
        // $nomSosRep = $maintenance->getNomSosRep();
        // $idVehicule = $maintenance->getIdVehicule();
        // $vehicule = $idVehicule->getMatricule();

        // $data = [
        //          ['Etat', 'Nom de la societe', 'Matricule'],
        //         ['Bonne etat', 'auto plus' , '165TUN6845'],
                
        //            ];

        // // définir les propriétés du document
        // $objPHPExcel->getProperties()->setCreator("Mon application Symfony")
        //     ->setLastModifiedBy("Mon application Symfony")
        //     ->setTitle("Export Excel")
        //     ->setSubject("Export Excel")
        //     ->setDescription("Export Excel");

        // // ajouter des données au document
        // $objPHPExcel->getActiveSheet()->fromArray($data, NULL, 'A1');

        // // formater les cellules du document
        // $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

        // // créer un objet Writer pour enregistrer le document au format Excel
        // $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        // // envoyer le document au navigateur pour le téléchargement
        // $response = new Response();
        // $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        // $response->headers->set('Content-Disposition', 'attachment;filename="export.xls"');
        // $response->headers->set('Cache-Control', 'max-age=0');
        // $writer->save('php://output');
        // $response->send();

        // return $response;

       
        
        // Créer un objet Spreadsheet
        $spreadsheet = new Spreadsheet();
        
        // Sélectionner la feuille active
        $sheet = $spreadsheet->getActiveSheet();
        
        // Remplir les données de la feuille
        $sheet->fromArray([
            ['Etat', 'Nom de la société', 'Matricule'],
            [$maintenance->getEtat(), $maintenance->getNomSosRep(), $maintenance->getIdVehicule()->getMatricule()],
        ]);
        
        // Créer un objet Writer pour exporter les données en Excel
        $writer = new Xlsx($spreadsheet);
        
        // Envoyer les en-têtes HTTP pour forcer le téléchargement du fichier
        $response = new \Symfony\Component\HttpFoundation\BinaryFileResponse($writer->write('php://output'));
        $response->setContentDisposition(\Symfony\Component\HttpFoundation\ResponseHeaderBag::DISPOSITION_ATTACHMENT, 'export.xlsx');
        
        return $response;
        


    }

}
