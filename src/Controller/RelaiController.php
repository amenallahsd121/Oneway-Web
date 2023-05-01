<?php

namespace App\Controller;

use App\Entity\Location;
use App\Entity\Relais;
use App\Form\RelaiFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpClient\HttpClient;

class RelaiController extends AbstractController
{
    #[Route('/affrelai', name: 'aff_relai')]
    public function afficherUsers(ManagerRegistry $Doctrine)
    {
        $em = $Doctrine->getManager();
        $relais = $em->getRepository(Relais::class)->findAll();
        return $this->render("relai/relaiView.html.twig",array('relai' =>$relais));

    }

    #[Route('/relai/{id}/delete', name: 'relai_delete')]
    public function delete(Relais $relai, ManagerRegistry $Doctrine): RedirectResponse
    {
        $em =$Doctrine->getManager();
        $em->remove($relai);
        $em->flush();
        
        return $this->redirectToRoute("aff_relai");

    }
    #[Route('/relai/{id}/edit', name: 'relai_edit')]
    public function edit(Relais $relai, Request $request, ManagerRegistry $Doctrine) 
    {
        $form = $this->createForm(RelaiFormType::class , $relai);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $Doctrine->getManager();
            $em->persist($relai);
            $em->flush();
            return $this->redirectToRoute("aff_relai");
        }
        return $this->render("relai/editrelai.html.twig",[
            "form" =>$form->createView()
        ]);

    }
    #[Route('/relaimap/{id}', name: 'relai_map')]
    public function map(  $id, ManagerRegistry $Doctrine) 
    {

        $em = $Doctrine->getManager();
        $locations= $em->getRepository(Location::class)->findBy(array('relai' => $id));
        for ($i = 0; $i < count($locations); $i++) {
            // Add each value to the new array using the [] syntax
            $ArrayX[] = $locations[$i]->getXaxe();
            $ArrayY[] = $locations[$i]->getYaxe();
        }
        return $this->render("relai/map.html.twig",[
            'xx' => $ArrayX,
            'yy' => $ArrayY,
        ]);

    }
    #[Route('/frontrelai', name: 'add_relai')]
    public function ajoutrelaiAction(Request $request,ManagerRegistry $Doctrine)
    {
        $relai = new Relais();
        $form = $this->createForm(RelaiFormType::class,$relai);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $Doctrine->getmanager();
            $em->persist($relai);
            $em->flush();
            return $this->redirectToRoute('aff_relai');
        }

        return $this->render("relai/addrelai.html.twig",[
            "form" =>$form->createView()
        ]);
        
    }

}
