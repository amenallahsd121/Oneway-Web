<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vehicule;
use App\Entity\Maintenance;
use App\Form\VehiculeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Builder\BuilderInterface;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Builder\BuilderRegistryInterface;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCodeBundle\Response\QrCodeResponse;


class VehiculeController extends AbstractController
{
    private $entityManager;
    private $customQrCodeBuilder;
    
    public function __construct(EntityManagerInterface $entityManager, BuilderInterface $customQrCodeBuilder)
    {
        $this->entityManager = $entityManager;
        $this->customQrCodeBuilder = $customQrCodeBuilder;
    }


    #[Route('/vehicule', name: 'app_vehicule')]
    public function index(Request $request): Response
    {
        $term = $request->query->get('term', '');
        $categoryId = $request->query->get('category', '');
        $data = $this->getDoctrine()->getRepository(Vehicule::class)->getAll($term, $categoryId);
        $categories = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        return $this->render('\vehicule\index.html.twig', [
            'list' => $data,
            'categories' => $categories
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




    #[Route('/vehicule/update/{id}', name: 'update_vehicule')]
    public function update(Request $req, $id)
    {

        $vehicule = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {



            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicule);
            $em->flush();


            $this->addFlash('notice', 'Vehicule à jours');

            return $this->redirectToRoute('app_vehicule');
        }

        return $this->renderForm('vehicule/modifiervehicule.html.twig', [
            'form' => $form
        ]);
    }





    #[Route('/vehicule/delete/{id}', name: 'delete_vehicule')]
    public function delete($id)
    {



        $data = $this->getDoctrine()->getRepository(Vehicule::class)->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();


        $this->addFlash('notice', 'Vehicule Supprimé');

        return $this->redirectToRoute('app_vehicule');
    }

     
    #[Route('vehicule/qrcode/{id}', name: 'qrcode')]
    public function qrcode(BuilderInterface $customQrCodeBuilder , $id ): Response
    {
        $vehicule = $this->entityManager->getRepository(Vehicule::class)->find($id);
        $matricule = $vehicule->getMatricule();
        $marque = $vehicule->getMarque();
        $idCategorie = $vehicule->getIdCategorie();
        $categorie = $idCategorie->getType();
        
    
        $qrCode = $this->customQrCodeBuilder
            ->size(400)
            ->margin(20)
            ->data('Les details de votre vehicule sont   : ' . $matricule . $marque . $categorie)
            ->build();
    
        return new QrCodeResponse($qrCode);
    } 
    
}
