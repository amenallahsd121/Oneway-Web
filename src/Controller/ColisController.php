<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Colis;
use App\Form\ColisType;
use App\Form\PaiementType;
use Endroid\QrCode\QrCode;
use App\Entity\Utilisateur;
use Endroid\QrCode\LabelAlignment;
use App\Repository\ColisRepository;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Doctrine\ORM\EntityManagerInterface;
use Endroid\QrCode\ErrorCorrectionLevel;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Endroid\QrCode\Builder\BuilderInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Endroid\QrCode\Builder\BuilderRegistryInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;







class ColisController extends AbstractController
{

    


    private $entityManager;
    private $customQrCodeBuilder;

    public function __construct(EntityManagerInterface $entityManager, BuilderInterface $customQrCodeBuilder)
    {
        $this->entityManager = $entityManager;
        $this->customQrCodeBuilder = $customQrCodeBuilder;
    }





    /////////////////////////////////////////////////     DISPLAY + PAGINATION    /////////////////////////////////////////////////////



    #[Route('/colis', name: 'app_colis')]
    public function detail(Request $request, PaginatorInterface $paginator, SessionInterface $session): Response
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
        $repository = $entityManager->getRepository(Colis::class);
        $query = $repository->createQueryBuilder('c')
            ->leftJoin('c.id_client', 'user')
            ->where('user.id = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('c.id_colis', 'DESC');
    
        $data = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );
    
        return $this->render('colis/index.html.twig', [
            'list' => $data
        ]);
    }
    





    /////////////////////////////////////////////////     ADD    /////////////////////////////////////////////////////




    #[Route('/colis/add', name: 'add_colis')]
    public function addcolis(ManagerRegistry $doctrine, Request $req, SessionInterface $session): Response
    {

        $em = $doctrine->getManager();
        $colis = new Colis();
        $form = $this->createForm(ColisType::class, $colis);
        $form->handleRequest($req);


        if ($form->isSubmitted() && $form->isValid()) {


            $session->start();
            $id = $_SESSION['user_id'];
            $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
            $colis->setUtilisateur($utilisateur);
            $this->entityManager->persist($colis);
            $this->entityManager->flush();

            $em->persist($colis);
            $em->flush();
            return $this->redirectToRoute('app_colis');
        }

        return $this->renderForm('colis/ajoutercolis.html.twig', ['form' => $form]);
    }






    /////////////////////////////////////////////////     UPDATE    /////////////////////////////////////////////////////



    #[Route('/colis/update/{id}', name: 'update_colis')]
    public function update(Request $req, $id)
    {

        $colis = $this->getDoctrine()->getRepository(Colis::class)->find($id);
        $form = $this->createForm(ColisType::class, $colis);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {

            $id = 123;
            $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
            $colis->setUtilisateur($utilisateur);
            $this->entityManager->persist($colis);
            $this->entityManager->flush();




            $em = $this->getDoctrine()->getManager();
            $em->persist($colis);
            $em->flush();




            return $this->redirectToRoute('app_colis');
        }

        return $this->renderForm('colis/modifier.html.twig', [
            'form' => $form
        ]);
    }




    /////////////////////////////////////////////////     DELETE    /////////////////////////////////////////////////////


    #[Route('/colis/delete/{id}', name: 'delete_colis')]
    public function delete($id)
    {



        $data = $this->getDoctrine()->getRepository(Colis::class)->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();



        return $this->redirectToRoute('app_colis');
    }










    /////////////////////////////////////////////////     PDF    /////////////////////////////////////////////////////


    #[Route('/colis/pdf/{id}', name: 'app_pdf')]
    public function pdf($id): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('isRemoteEnabled', true);

        $colis = $this->getDoctrine()->getRepository(Colis::class)->find($id);

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);



        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('colis/pdf.html.twig', [
            'colis' => [$colis]
        ]);


        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'landscape');


        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $output = $dompdf->output();
        $response = new Response($output);
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment;filename=mypdf.pdf');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }








    /////////////////////////////////////////////////     QR CODE    /////////////////////////////////////////////////////





    #[Route('colis/qrcode/{id}', name: 'qrcodee')]
    public function qrcode(BuilderInterface $customQrCodeBuilder, $id): Response
    {
        $colis = $this->entityManager->getRepository(Colis::class)->find($id);
        $livraison = $colis->getLivraisons();
        $livraisonetat = $livraison ? $livraison->getEtat() : "Pas Encore Delivré";

        $qrCode = $this->customQrCodeBuilder
            ->size(400)
            ->margin(20)
            ->data('Votre Colis Est  : ' . $livraisonetat)
            ->build();

        return new QrCodeResponse($qrCode);
    }









    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////// Mobile ////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




#[Route('/displaycolis', name: 'displaycolis')]
public function displaycolis(ColisRepository $repo, NormalizerInterface $normalizer): Response
{


    $colis = $repo->findAll();
    $colisNormalises = $normalizer->normalize($colis, 'json', ['groups' => "Colis"]);
    $json = json_encode($colisNormalises);
    return new Response($json);
  
}


// #[Route('/addcolis', name: 'addcolis')]
// public function new(ManagerRegistry $doctrine, Request $request)
// {
//     $entityManager = $doctrine->getManagerForClass(Livreur::class);

//     $colis = new Colis();

//     $colis->setcinLivreur($request->get('CinLivreur'));
//     $colis->setNom($request->get('Nom'));
//     $colis->setPrenom($request->get('Prenom'));
//     $colis->setVehicule($request->get('Vehicule'));
    

//     $entityManager->persist($colis);
//     $entityManager->flush();

//     $serializer = new Serializer([new ObjectNormalizer()]);
//     $formatted = $serializer->normalize($colis);
//     return new JsonResponse($formatted);

// }

// #[Route('/colismodify/{id}', name: 'colismodify')]

// public function modify(ManagerRegistry $doctrine, Request $request, $id)
// {
//     $entityManager = $doctrine->getManagerForClass(Livreur::class);
//     $livreur = $entityManager->getRepository(Livreur::class)->find($id);

//     $livreur->setcinLivreur($request->get('CinLivreur'));
//     $livreur->setNom($request->get('Nom'));
//     $livreur->setPrenom($request->get('Prenom'));
//     $livreur->setVehicule($request->get('Vehicule'));
    

//     $entityManager->persist($livreur);

//     $entityManager->flush();
//     $serializer = new Serializer([new ObjectNormalizer()]);
//     $formatted = $serializer->normalize($request);
//     return new JsonResponse($formatted);
// }

// #[Route('/colisdelete/{id}', name: 'colisdelete')]
// public function deleteliv(ManagerRegistry $doctrine, $id): Response
// {
//     $entityManager = $doctrine->getManagerForClass(Livreur::class);
//     $livreur = $entityManager->getRepository(Livreur::class)->find($id);

//     if ($livreur != null) {
//         $entityManager->remove($livreur);
//         $entityManager->flush();
//         $serializer = new Serializer([new ObjectNormalizer()]);
//         $formatted = $serializer->normalize("Category deleted succefully");
//         return new JsonResponse($formatted);
//     }
//     return new JsonResponse("Category not found");
// }




}
