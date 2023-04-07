<?php

namespace App\Controller;

use App\Entity\Trajetoffre;
use App\Form\Trajetoffre1Type;
use App\Repository\TrajetoffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/trajetoffre')]
class TrajetoffreController extends AbstractController
{
    #[Route('/', name: 'app_trajetoffre_index', methods: ['GET'])]
    public function index(TrajetoffreRepository $trajetoffreRepository): Response
    {
        return $this->render('trajetoffre/index.html.twig', [
            'trajetoffres' => $trajetoffreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_trajetoffre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TrajetoffreRepository $trajetoffreRepository): Response
    {
        $trajetoffre = new Trajetoffre();
        $form = $this->createForm(Trajetoffre1Type::class, $trajetoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trajetoffreRepository->save($trajetoffre, true);

            return $this->redirectToRoute('app_trajetoffre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('trajetoffre/new.html.twig', [
            'trajetoffre' => $trajetoffre,
            'form' => $form,
        ]);
    }

    #[Route('/{idtrajetoffre}', name: 'app_trajetoffre_show', methods: ['GET'])]
    public function show(Trajetoffre $trajetoffre): Response
    {
        return $this->render('trajetoffre/show.html.twig', [
            'trajetoffre' => $trajetoffre,
        ]);
    }

    #[Route('/{idtrajetoffre}/edit', name: 'app_trajetoffre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Trajetoffre $trajetoffre, TrajetoffreRepository $trajetoffreRepository): Response
    {
        $form = $this->createForm(Trajetoffre1Type::class, $trajetoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trajetoffreRepository->save($trajetoffre, true);

            return $this->redirectToRoute('app_trajetoffre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('trajetoffre/edit.html.twig', [
            'trajetoffre' => $trajetoffre,
            'form' => $form,
        ]);
    }

    #[Route('/{idtrajetoffre}', name: 'app_trajetoffre_delete', methods: ['POST'])]
    public function delete(Request $request, Trajetoffre $trajetoffre, TrajetoffreRepository $trajetoffreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trajetoffre->getIdtrajetoffre(), $request->request->get('_token'))) {
            $trajetoffreRepository->remove($trajetoffre, true);
        }

        return $this->redirectToRoute('app_trajetoffre_index', [], Response::HTTP_SEE_OTHER);
    }
}
