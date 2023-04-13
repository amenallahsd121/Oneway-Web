<?php

namespace App\Controller;

use App\Entity\Categorieoffre;
use App\Form\Categorieoffre1Type;
use App\Repository\OffreRepository;
use Symfony\UX\Chartjs\Model\Chart;
use App\Repository\CategorieoffreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/categorieoffre')]
class CategorieoffreController extends AbstractController
{
    #[Route('/', name: 'app_categorieoffre_index', methods: ['GET'])]
    public function index(CategorieoffreRepository $categorieoffreRepository): Response
    {
        return $this->render('categorieoffre/index.html.twig', [
            'categorieoffres' => $categorieoffreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categorieoffre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CategorieoffreRepository $categorieoffreRepository,OffreRepository $offreRepository,ChartBuilderInterface $chartBuilder): Response
    {
        $categorieoffre = new Categorieoffre();
        $form = $this->createForm(Categorieoffre1Type::class, $categorieoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieoffreRepository->save($categorieoffre, true);

            return $this->redirectToRoute('app_categorieoffre_index', [], Response::HTTP_SEE_OTHER);
        }
        
        $categories = $categorieoffreRepository->findAll();
        $label = [];
        foreach ($categories as $category) {
            $label[] = $category->getTypeoffre();
        }
    
    // Get the number of offers associated with each category
    $chartData = [];
    foreach ($categories as $category) {
        $poid = $category->getPoidsoffre();
       $nbre=$category->getNbrecolisoffre();
    $som=$poid*$nbre;
        $chartData[] = $som;
    }
        $chart = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);
        $chart->setData([
            'labels'   => $label,
            'datasets' => [
                [
                    'label'           => 'les categories utilisees:',
                    'backgroundColor' => ['rgb(51, 153, 255)', 'rgb(255, 99, 132)', 'rgb(75, 192, 192)'],
                    'borderColor'     => ['rgb(51, 153, 255)', 'rgb(255, 99, 132)', 'rgb(75, 192, 192)'],
                    'data'            => $chartData,
                ],
            ],
            'hoverOffset'   => 4,
        ]);
        return $this->renderForm('categorieoffre/new.html.twig', [
            'categorieoffre' => $categorieoffre,
            'form' => $form,
            'chart' => $chart
        ]);
    }

    #[Route('/{idcatoffre}', name: 'app_categorieoffre_show', methods: ['GET'])]
    public function show(Categorieoffre $categorieoffre): Response
    {
        return $this->render('categorieoffre/show.html.twig', [
            'categorieoffre' => $categorieoffre,
        ]);
    }

    #[Route('/{idcatoffre}/edit', name: 'app_categorieoffre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Categorieoffre $categorieoffre, CategorieoffreRepository $categorieoffreRepository): Response
    {
        $form = $this->createForm(Categorieoffre1Type::class, $categorieoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieoffreRepository->save($categorieoffre, true);

            return $this->redirectToRoute('app_categorieoffre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorieoffre/edit.html.twig', [
            'categorieoffre' => $categorieoffre,
            'form' => $form,
        ]);
    }

    #[Route('/{idcatoffre}', name: 'app_categorieoffre_delete', methods: ['POST'])]
    public function delete(Request $request, Categorieoffre $categorieoffre, CategorieoffreRepository $categorieoffreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieoffre->getIdcatoffre(), $request->request->get('_token'))) {
            $categorieoffreRepository->remove($categorieoffre, true);
        }

        return $this->redirectToRoute('app_categorieoffre_index', [], Response::HTTP_SEE_OTHER);
    }

    
   
}

