<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Demande;
use App\Form\Demande1Type;
use App\Entity\Utilisateur;
use App\Repository\DemandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/demande')]
class DemandeController extends AbstractController
{
    #[Route('/', name: 'app_demande_index', methods: ['GET'])]
    public function index(DemandeRepository $demandeRepository): Response
    {
        return $this->render('demande/index.html.twig', [
            'demandes' => $demandeRepository->findAll(),
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
    public function new(Request $request, DemandeRepository $demandeRepository,$idOffre): Response
    {    
        $demande = new Demande();

        $form = $this->createForm(Demande1Type::class, $demande);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $Offre = $this->getDoctrine()->getRepository(Offre::class)->find($idOffre);
    $demande->setIdoffre($Offre);
            $demandeRepository->save($demande, true);
    
            return $this->redirectToRoute('app_offre_Front', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('demande/new.html.twig', [
            'demande' => $demande,
            'form' => $form,
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
