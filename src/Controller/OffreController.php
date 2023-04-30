<?php

namespace App\Controller;

use DateTime;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Offre;
use App\Entity\Demande;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use App\Repository\DemandeRepository;
use App\Repository\TrajetoffreRepository;
use App\Repository\UtilisateurRepository;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\CategorieoffreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\TexterInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/offre')]
class OffreController extends AbstractController
{
    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }
    // ...
    
    #[Route('/', name: 'app_offre_index', methods: ['GET'])]
    public function index(OffreRepository $offreRepository): Response
    {
        return $this->render('offre/index.html.twig', [
            'offres' => $offreRepository->findAll(),
        ]);
    }
    #[Route('/your-route/{idtrajetoffre}', name: 'your_route_name', methods: ['GET'])]
    public function yourMethod(TrajetoffreRepository $trajetoffreRepository, string $idtrajetoffre): JsonResponse
    {
        // Retrieve the trajet data based on the provided ID using the repository
        $trajetData = $trajetoffreRepository->find($idtrajetoffre);

        // Check if the trajet with the provided ID exists
        if (!$trajetData) {
            return $this->json(['error' => 'Trajet not found'], 404);
        }

        // Customize the JSON response data
        $responseData = [
            'nbreescaleoffre' => $trajetData->getNbreescaleoffre(),
            'limitekmoffre' => $trajetData->getLimitekmoffre(),
            'description' => $trajetData->getDescription(),
            // Add other necessary data fields
        ];

        // Assuming you want to return a JSON response with the customized data
        return $this->json($responseData);
    }

    #[Route('/ListOffre', name: 'app_offre_Front', methods: ['GET'])]
public function FrontList(OffreRepository $offreRepository,UtilisateurRepository $utilisateurRepository,Request $request, PaginatorInterface $paginator,): Response
{
    // Retrieve offers using findBy method
    $offres = $offreRepository->findByIdUser(69);
    $user = $utilisateurRepository->find(69);
    $rdvs = [];
    foreach($offres as $offre){
        $rdvs[] = [
            'id' => $offre->getIdoffre(),
            'title' => $offre->getDescriptionoffre(),
            'start' => $offre->getDateoffre()->format('Y-m-d'),
            'end' => $offre->getDatesortieoffre()->format('Y-m-d'),

        ];
    }
    $data = json_encode($rdvs);
    return $this->render('offre/showoffreFront.html.twig', [
       'data'=>$data,
        'offre' => $offres, 
        'user'=>$user,
        
    ]);
}

    
    #[Route('/new', name: 'app_offre_new', methods: ['GET', 'POST'])]
    public function new(TexterInterface $texter, UtilisateurRepository $UtilisateurRepository,Request $request, OffreRepository $offreRepository, CategorieoffreRepository $categorieoffreRepository): Response
    { 
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $timezone = new \DateTimeZone('Europe/Paris');
        $now = \DateTime::createFromFormat('Y-m-d H:i:s', '2023-04-08 12:00:00', $timezone);
        $datetime = new DateTime();
        $formData = $form->getData();

        $datetime = $formData->getDatesortieoffre();
        if ($now >=  $datetime) {
            $offre=$offre->setEtat("en cours");
        } else {
            $dateString = 'N/A';
        }

        if ($now !== null) {
            $offre->setDateoffre($now);
        } 
        

        
        if ($datetime !== null) {
            $formData->setDatesortieoffre($dateString);
        } 
        $user=$UtilisateurRepository->find(69);
        $formData->setIdUser($user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
    
            $offreRepository->save($offre, true);
    

            $sms = new SmsMessage(
                // the phone number to send the SMS message to
                '+21693133746',
                // the message
                'A new login was detected!',
                // optionally, you can override default "from" defined in transports
                '+21693133746',
            );

            $sentMessage = $texter->send($sms);
            return $this->redirectToRoute('app_offre_Front', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre/new.html.twig', [
            'offre' => $offre,
            'form' => $form,
            'offres' => $offreRepository->findAll(),
            'categorieoffres' => $categorieoffreRepository->findAll(),

        ]);
    }

   
    #[Route('/{idoffre}', name: 'app_offre_show', methods: ['GET'])]
    public function show(Offre $offre): Response
    {
        return $this->render('offre/show.html.twig', [
            'offre' => $offre,
        ]);
    }

    #[Route('/{idoffre}/edit', name: 'app_offre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offre $offre, OffreRepository $offreRepository): Response
    {
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offreRepository->save($offre, true);

            return $this->redirectToRoute('app_offre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre/edit.html.twig', [
            'offre' => $offre,
            'form' => $form,
        ]);
    }
    #[Route('/{idoffre}/demande', name: 'app_offre_demande', methods: ['GET', 'POST'])]

    public function demande(Request $request,Offre $offre,$idoffre,OffreRepository $offreRepository): Response
    {    
        $now = new DateTime();

        $offre->setdateoffre($now) ;

        $offre->setnbredemande( $offre->getnbredemande()+1);
        $offreRepository->save($offre, true);

            return $this->redirectToRoute('app_demande_new', ['idOffre' =>$idoffre], Response::HTTP_SEE_OTHER);
        }

       
    

    #[Route('/{idoffre}', name: 'app_offre_delete', methods: ['POST'])]
    public function delete(Request $request, Offre $offre, OffreRepository $offreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offre->getIdoffre(), $request->request->get('_token'))) {
            $offreRepository->remove($offre, true);
        }

        return $this->redirectToRoute('app_offre_Front', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/pdf/generator/{idoffre}', name: 'pdf_generator', methods: ['GET'])]
    public function pdf(Offre $offre): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('isRemoteEnabled', true);


        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);



        // Retrieve the HTML generated in our twig file
        $html =  $this->renderView('offre/showpdf.html.twig', [
            'offre' => $offre,
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


    
 
    private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        
        return $base64;
    }

}
