<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Demande;
use App\Form\Demande1Type;
use App\Entity\Utilisateur;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Message;
use Symfony\Component\Mailer\Mailer;
use App\Repository\DemandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
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
    #[Route('/', name: 'app_demande_index', methods: ['GET'])]
    public function index(DemandeRepository $offreRepository,Request $request, PaginatorInterface $paginator): Response
    {
        // Retrieve offers using findBy method
        $demandes = $offreRepository->findBy([], ['iddemande' => 'DESC']);
    
        // Paginate the results
        $pagination = $paginator->paginate(
            $demandes,
            $request->query->getInt('page', 1),
            3 // Items per page
        );
    
        return $this->render('demande/index.html.twig', [
            'pagination' => $pagination,
            'demandes' => $demandes,

        ]);
    }
    
    #[Route('/{idoffre}', name: 'app_demande_indexoffre', methods: ['GET'])]
    public function indexbyoffre(DemandeRepository $demandeRepository,$idoffre): Response
    {
        return $this->render('demande/indexback.html.twig', [
            'demandes' => $demandeRepository->findBy(['idoffre' => $idoffre]),
        ]);
    }
    #[Route('/{idOffre}/new', name: 'app_demande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DemandeRepository $demandeRepository,$idOffre,MailerInterface $mailer): Response
    {    
        $demande = new Demande();
$id=69;
        $form = $this->createForm(Demande1Type::class, $demande);
        $formData = $form->getData();

        $user= $this->getDoctrine()->getRepository(Utilisateur::class)->find(69);
        $demande->setIdpersonne($user);

        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $Offre = $this->getDoctrine()->getRepository(Offre::class)->find($idOffre);
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
    
            return $this->redirectToRoute('app_offre_Front', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('demande/new.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }
    #[Route('/Listdemandes', name: 'app_demande_Front', methods: ['GET'])]
    public function FrontList(DemandeRepository $DemandeRepository,Request $request, PaginatorInterface $paginator): Response
    {
        // Retrieve offers using findBy method
        $offers = $DemandeRepository->findByIdUser(69);
        $o = $DemandeRepository->count($offers);
        if($o>= 10){$s=$o;}else if($o<=100 && $o>10) {$s=$o/10;}else{$s=$o;}
        // Paginate the results
        $pagination = $paginator->paginate(
            $offers,
            $request->query->getInt('page', 1),
            3 // Items per page
        );
    
        return $this->render('demande/indexback.html.twig', [
            'demandes' => $pagination,
        ]);
    }
    #[Route('/detail/{iddemande}', name: 'app_demande_show', methods: ['GET'])]
    public function show(Demande $demande): Response
    {
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

    #[Route('/{iddemande}', name: 'app_demande_delete', methods: ['POST'])]
    public function delete(Request $request, Demande $demande, DemandeRepository $demandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demande->getIddemande(), $request->request->get('_token'))) {
            $demandeRepository->remove($demande, true);
        }

        return $this->redirectToRoute('app_demande_index', [], Response::HTTP_SEE_OTHER);
    }
}
