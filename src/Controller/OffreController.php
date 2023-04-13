<?php

namespace App\Controller;

use DateTime;
use Dompdf\Dompdf;
use App\Entity\Offre;
use App\Entity\Demande;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use App\Repository\DemandeRepository;
use App\Repository\CategorieoffreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/offre')]
class OffreController extends AbstractController
{
    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }
    #[Route('/', name: 'app_offre_index', methods: ['GET'])]
    public function index(OffreRepository $offreRepository): Response
    {
        return $this->render('offre/index.html.twig', [
            'offres' => $offreRepository->findAll(),
        ]);
    }
    #[Route('/ListOffre', name: 'app_offre_Front', methods: ['GET'])]
    public function FrontList(OffreRepository $offreRepository): Response
    {
        return $this->render('offre/showoffreFront.html.twig', [
            'offre' => $offreRepository->findAll(),
        ]);
    }
    #[Route('/new', name: 'app_offre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OffreRepository $offreRepository, CategorieoffreRepository $categorieoffreRepository): Response
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
            $now = $now->format('Y-m-d H:i:s');
        } else {
            $now = 'N/A';
        }
        
        $now=$offre->setDateoffre($now);

        
        if ($datetime !== null) {
            $dateString = $datetime->format('Y-m-d H:i:s');
        } else {
            $dateString = 'N/A';
        }
        $formData->setDatesortieoffre($dateString);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
    
            $offreRepository->save($offre, true);
    
            $offreRepository->save($offre, true);

            return $this->redirectToRoute('app_offre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre/new.html.twig', [
            'offre' => $offre,
            'form' => $form,
            
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
        $offre->setdateoffre($now->format('Y-m-d H:i:s')) ;

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
     
    public function pdf(Offre $offre,KernelInterface $kernel): Response
    {
         
      
        $html =  $this->renderView('offre/showpdf.html.twig', [
            'offre' => $offre,
        ]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        
        // In this case, we want to write the file in the public directory
               $publicDirectory = $this->kernel->getProjectDir() .'/public/pdf';
        // e.g /var/www/project/public/mypdf.pdf
        $pdfFilepath =  $publicDirectory . "/mypdf{$offre->getIdoffre()}.pdf";
        
        // Write file to the desired path
        file_put_contents($pdfFilepath, $output);
        
        $this->addFlash('success', 'Offre Enregister!');

        // Send some text response
        return new Response (

            $dompdf->stream('resume', ["Attachment" => false]),
            Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );
          
        
       
    }
 
    private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

}
