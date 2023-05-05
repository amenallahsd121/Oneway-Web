<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Reclamation;
use App\Entity\Utilisateur;
use App\Form\ReclamationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Notifier\Notifier;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\AdminRecipient;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;





class ReclamationController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }



    #[Route('/reclamation', name: 'app_reclamation')]
    public function index(Request $request, PaginatorInterface $paginator, SessionInterface $session): Response
    {

        $session->start();
        
        $t = $_SESSION['user_type']  ;
        $username = $_SESSION['username'] ?? null;
        if ($username === null) {

            echo "<script>alert('Login first');</script>";
            return $this->redirectToRoute("check_login");
        }
         else if($t == "Client")
        {
           // echo "<script>alert('this user is  $username ');</script>";
           
        }
        else {
            echo "<script>alert('Logout first');</script>";
            return $this->redirectToRoute("aff_user");
        }
        
        $userId = $_SESSION['user_id'];
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Reclamation::class);
        $query = $repository->createQueryBuilder('c')
            ->leftJoin('c.id_user', 'user')
            ->where('user.id = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('c.id_reclamation', 'DESC');
    
        $data = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('reclamation/index.html.twig', [
            'list' => $data
        ]);
    }






    #[Route('/reclamation/add', name: 'add_reclamation')]
    public function addreclamation(ManagerRegistry $doctrine, Request $req,SessionInterface $session): Response
    {
        $badWords = ['merde','fuck','shit','con','connart','putain','pute','chier','bitch','bèullshit','bollocks','damn','putin'];
       

        $em = $doctrine->getManager();
        $reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($req);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $text = $reclamation->getTextRec();
            foreach ($badWords as $word) {
                if (stripos($text, $word) !== false) {
                    $this->addFlash('error', 'Le mot interdit "' . $word . '" a été trouvé dans le texte de la réclamation.');
                    return $this->redirectToRoute('add_reclamation');
                }
            }
    
            $session->start();
            $id = $_SESSION['user_id'];
            $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
            $reclamation->setIdUser($utilisateur);
            $em->persist($reclamation);
            $em->flush();
    

        }
    
        return $this->renderForm('reclamation/ajouterreclamation.html.twig', [
            'form' => $form, 
        ]);
    }





    #[Route('/reclamation/update/{id}', name: 'update_reclamation')]
    public function update(Request $req, $id)
    {

        $reclamation = $this->getDoctrine()->getRepository(Reclamation::class)->find($id);
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {

            
            $this->entityManager->persist($reclamation);
            $this->entityManager->flush();

            ////////////////////////////////////////////////////

            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();



            return $this->redirectToRoute('app_reclamation');
        }

        return $this->renderForm('reclamation/modifierreclamation.html.twig', [
            'form' => $form
        ]);
    }



    #[Route('/reclamation/delete/{id}', name: 'delete_reclamation')]
    public function delete($id)
    {



        $data = $this->getDoctrine()->getRepository(Reclamation::class)->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();




        return $this->redirectToRoute('app_reclamation');
    }



    #[Route('/reclamation/pdf/{id}', name: 'app_pdfr')]
    public function pdf($id): Response
    {
        // configurer les option de pdf
        $pdfOptions = new Options();
        $pdfOptions->set('isRemoteEnabled', true);

        $reclamation = $this->getDoctrine()->getRepository(Reclamation::class)->find($id);

        // pdf jdid hotli fiha les option
        $dompdf = new Dompdf($pdfOptions);



        
        $html = $this->renderView('reclamation/pdf.html.twig', [
            // variale html  bech inraja3 fiha el page el mezayna
            'reclamation' => [$reclamation]
        ]);


        // el variable eli feha les option  pdf option + html
          $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'landscape'); 


        // Render the HTML as PDF
        $dompdf->render();

        
        // resultat
        $output = $dompdf->output();
        $response = new Response($output);
        // el google chrome bech ya9rahom
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment;filename=mypdf.pdf');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }
}
