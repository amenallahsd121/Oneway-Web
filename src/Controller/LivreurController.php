<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Livreur;
use App\Form\LivreurType;
use Symfony\Component\Process\Process;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yectep\Bundle\DatatableBundle\DataTable\DataTableFactory;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




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








    #[Route('/livreur/orc', name: 'orc')]
    public function ocr(Request $request): Response
    {

        // Get the uploaded file
        $file = $request->files->get('image');


        // Get the file path
        $filePath = $file->getPathname();

        // Create a new Process instance
        $process = new Process(['C:\python\python.exe', 'pythonscript.py', $filePath]);

        // Run the process
        $process->run();

        // Check if there was an error running the process
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Get the output of the process
        $output = $process->getOutput();

        // Throw exception if output is null
        if ($output === null) {
            throw new \RuntimeException('Output is null');
        }

        // Split the output by newline character to get each line
        $lines = explode("\n", trim($output));


        // Assign each line to a separate variable
        $value1 = trim($lines[0]);
        $value2 = trim($lines[1]);
        $value3 = trim($lines[2]);


        // Create a new Livreur instance and set the values
        $livreur = new Livreur();
        $livreur->setCinLivreur($value1);
        $livreur->setNom($value2);
        $livreur->setPrenom($value3);
        $livreur->setVehicule("Partner");

        $session = $request->getSession();
        $session->set('livreur', $livreur);




        return $this->redirectToRoute('add_livreur_photo');
    }




    #[Route('/livreur/add/photo', name: 'add_livreur_photo')]
    public function addlivreurphoto(ManagerRegistry $doctrine, Request $req): Response
    {

        $session = $req->getSession();
        $Livreur = $session->get('livreur');

        $em = $doctrine->getManager();
        
       


        $form = $this->createForm(LivreurType::class, $Livreur);
        $form->handleRequest($req);


        if ($form->isSubmitted() && $form->isValid()) {


            $em->persist($Livreur);
            $em->flush();
            return $this->redirectToRoute('app_livreur');
        }

        return $this->renderForm('livreur/ajouterlivreur.html.twig', ['form' => $form]);
    }
}





// throw new \RuntimeException(sprintf('Output is not null: %s', $output));