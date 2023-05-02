<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Demande;
use App\Form\Demande1Type;
use Endroid\QrCode\QrCode;
use App\Entity\Utilisateur;
use Symfony\Component\Mime\Email;
use App\Repository\OffreRepository;
use Symfony\Component\Mailer\Mailer;
use App\Repository\DemandeRepository;
use App\Repository\UtilisateurRepository;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;


#[Route('/demande')]
class DemandeController extends AbstractController
{
   
  

 

    #[Route('/{idoffre}', name: 'app_demande_indexoffre', methods: ['GET'])]
    public function indexbyoffre(DemandeRepository $demandeRepository,$idoffre,Offre $offre): Response
    {
        return $this->render('demande/indexback.html.twig', [
            'demandes' => $demandeRepository->findBy(['idoffre' => $idoffre]),
            "offre" =>$offre,
        ]);
    }

    
    #[Route('offredemande/{idoffre}', name: 'app_demande_index', methods: ['GET'])]
    public function index(UtilisateurRepository $UtilisateurRepository,DemandeRepository $offreRepository,Request $request, PaginatorInterface $paginator,Offre $offre,$idoffre): Response
    {
        // Retrieve offers using findBy method
        $d = $UtilisateurRepository->find(69);

        $demandes = $offreRepository->findByidoffre($idoffre);
        $utilisateur = $d->getName();
        $lastname = $d->getLastName();
        $email = $d->getEmail();

        // Generate the QR code
       
        // Paginate the results
        $pagination = $paginator->paginate(
            $demandes,
            $request->query->getInt('page', 1),
            3 // Items per page
        );
        return $this->render('demande/index.html.twig', [
            'pagination' => $pagination,
            'demandes' => $demandes,
            'Offre' => $offre,
                    ]);
       
    }
    

  


  


    #[Route('/{idOffre}/new', name: 'app_demande_new', methods: ['GET', 'POST'])]
    public function new( OffreRepository $offreRepository,Request $request, DemandeRepository $demandeRepository,$idOffre,MailerInterface $mailer): Response
    {    
        $demande = new Demande();
$id=69;
        $form = $this->createForm(Demande1Type::class, $demande);
        $formData = $form->getData();
        $user= $this->getDoctrine()->getRepository(Utilisateur::class)->find(69);
        $demande->setIdpersonne($user);
        $Offre = $this->getDoctrine()->getRepository(Offre::class)->find($idOffre);
        $demande->setIdoffre($Offre);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
           
            $email= $user->getEmail();
            $id2= $Offre->getIdUser();

            $user4 = $this->getDoctrine()->getRepository(Utilisateur::class)->find($id2);
            $email2= $user4->getEmail();

    $demande->setIdoffre($Offre);
    $email = (new Email())
      ->from($email)
      ->to($email2)
      ->html('/templates/demande/welcome.html.twig')
      ;
      try {
        $mailer->send($email);
    } catch (TransportExceptionInterface $e) {
       
    }
;



$this->addFlash('success', 'VOTRE Demande  A ETE PASSE AVEC SUCCEE ');
            $demandeRepository->save($demande, true);
            $totalArticles = $demandeRepository->createQueryBuilder('a')
            // Filter by some parameter if you want
            ->select('COUNT(a.idoffre)')
            ->where('a.idoffre = :idOffre')
             ->setParameter('idOffre',$idOffre)
           ;
           $qp= $totalArticles ->getQuery()->getSingleScalarResult();
        
           $count = (int)$qp;
            $Offre->setNbredemande($count);
            $offreRepository->save($Offre, true);

            return $this->redirectToRoute('app_offre_new', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('demande/new.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }
    #[Route('/Listdemandes', name: 'app_demande_Front', methods: ['GET'])]
    public function FrontList(UtilisateurRepository $UtilisateurRepository,DemandeRepository $DemandeRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $d = $UtilisateurRepository->find(69);

        // Retrieve offers using findBy method
        $demande = $DemandeRepository->findByIdUser($d);
      
        // Paginate the results
        $pagination = $paginator->paginate(
            $demande,
            $request->query->getInt('page', 1),
            3 // Items per page
        );
       
        return $this->render('demande/indexback.html.twig', [
            'demandes' => $pagination,
        ]);
    }
    #[Route('/detail', name: 'app_demande_show', methods: ['GET'])]
    public function show(UtilisateurRepository $UtilisateurRepository,DemandeRepository $DemandeRepository): Response
    {        $d = $UtilisateurRepository->find(69);
$
        $utilisateur = $d->getName();
        $lastname = $d->getLastName();
        $email = $d->getEmail();

        // Generate the QR code
       
        // Paginate the results
        $pagination = $paginator->paginate(
            $demandes,
            $request->query->getInt('page', 1),
            3 // Items per page
        );
        return $this->render('demande/show.html.twig', [
            'demande' => $demande,
        ]);
    }
    #[Route('/detailback/{iddemande}', name: 'app_demande_showback', methods: ['GET'])]
    public function showback(Demande $demande): Response
    {
        return $this->render('demande/showback.html.twig', [
            'demande' => $demande,
        ]);
    }

    #[Route('/{iddemande}/edit', name: 'app_demande_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Demande $demande, DemandeRepository $demandeRepository): Response
    {
        $form = $this->createForm(Demande1Type::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandeRepository->save($demande, true);

            return $this->redirectToRoute('app_demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demande/edit.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }

    #[Route('/qrcode/{iddemande}', name: 'app_Demande_qrcode')]
    public function index3( Demande $Demande ): Response
    {
        
        
      
        return $this->render('\demande\data.html.twig', [
            
            'evenement' => $Demande
        ]);
    }
    #[Route('/{iddemande}', name: 'app_demande_delete', methods: ['POST'])]
    public function delete( OffreRepository $offreRepository,Request $request, Demande $demande, DemandeRepository $demandeRepository): Response
    {       $idOffre=  $demande->getIdOffre();
           $Offre = $this->getDoctrine()->getRepository(Offre::class)->find($idOffre);

        if ($this->isCsrfTokenValid('delete'.$demande->getIddemande(), $request->request->get('_token'))) {
            $demandeRepository->remove($demande, true);
            
            $totalArticles = $demandeRepository->createQueryBuilder('a')
            // Filter by some parameter if you want
            ->select('COUNT(a.idoffre)')
            ->where('a.idoffre = :idOffre')
             ->setParameter('idOffre',$idOffre)
           ;
           $qp= $totalArticles ->getQuery()->getSingleScalarResult();
        
           $count = (int)$qp;
            $Offre->setNbredemande($count);
            $offreRepository->save($Offre, true);
        }

        return $this->redirectToRoute('app_demande_index', ['idoffre' => $Offre->getIdoffre()], Response::HTTP_SEE_OTHER);
    }
}