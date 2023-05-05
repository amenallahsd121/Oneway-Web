<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Entity\Livraison;
use App\Form\LivraisonType;
use Symfony\Component\Process\Process;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LivraisonController extends AbstractController
{


    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }



    #[Route('/livraison/colis', name: 'app_livraison_colis')]
    public function indexcolis(SessionInterface $session): Response
    {
        $session->start();
        $t = $_SESSION['user_type']  ;
        $username = $_SESSION['username'] ?? null;
        if ($username === null) {

            echo "<script>alert('Login first');</script>";
            return $this->redirectToRoute("check_login");
        }
         else if($t == "Admin")
        {
           // echo "<script>alert('this user is  $username ');</script>";
           
        }
        else {
            echo "<script>alert('Logout first');</script>";
            return $this->redirectToRoute("front_edit");
        }

        $entityManager = $this->getDoctrine()->getManager();
        $colisRepository = $entityManager->getRepository(Colis::class);
        $queryBuilder = $colisRepository->createQueryBuilder('c');

        $query = $colisRepository->createQueryBuilder('c')
            ->leftJoin('c.livraisons', 'l')
            ->where('l.idLivraison IS NULL')
            ->getQuery();

        $ColisNotLivraison = $query->getResult();


        return $this->render('livraison/colis.html.twig', [
            'list' => $ColisNotLivraison
        ]);
    }





    #[Route('/livraison', name: 'app_livraison')]
    public function indexlivraison(): Response
    {
        $data = $this->getDoctrine()->getRepository(Livraison::class)->findAll();
        return $this->render('livraison/livraison.html.twig', [
            'list' => $data
        ]);
    }



    #[Route('/livraison/add/{id}', name: 'add_livraison')]
    public function addlivraison($id, ManagerRegistry $doctrine, Request $req): Response
    { {

            $em = $doctrine->getManager();
            $livraison = new Livraison();
            $form = $this->createForm(LivraisonType::class, $livraison);
            $form->handleRequest($req);


            if ($form->isSubmitted() && $form->isValid()) {
                $colis = $this->entityManager->getRepository(Colis::class)->find($id);
                $livraison->setColis($colis);
                $this->entityManager->persist($livraison);
                $this->entityManager->flush();

                /////////////////////////////////////////////////////////////////

                $em->persist($livraison);
                $em->flush();
                return $this->redirectToRoute('app_livraison');
            }

            return $this->renderForm('livraison/ajouterlivraison.html.twig', ['form' => $form]);
        }
    }





    #[Route('/livraison/update/{id}', name: 'update_livraison')]
    public function update(Request $req, $id)
    {

        $livraison = $this->getDoctrine()->getRepository(Livraison::class)->find($id);
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {



            $em = $this->getDoctrine()->getManager();
            $em->persist($livraison);
            $em->flush();


            return $this->redirectToRoute('app_livraison');
        }

        return $this->renderForm('livraison/modifierlivraison.html.twig', [
            'form' => $form
        ]);
    }





    #[Route('/livraison/delete/{id}', name: 'delete_livraison')]
    public function delete($id)
    {



        $data = $this->getDoctrine()->getRepository(Livraison::class)->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();




        return $this->redirectToRoute('app_livraison');
    }















}
