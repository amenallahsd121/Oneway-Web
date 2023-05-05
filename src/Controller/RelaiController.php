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
    public function map( $id, ManagerRegistry $Doctrine) 
    {

        $em = $Doctrine->getManager();
        $loc = new Location();
        $relai= $em->getRepository(Relais::class)->find($id);
        $city = $relai->getCity();
        if($city == "Tunis")
        {
            $loc->setIdRelai($relai);
            $loc->setXaxe(36.834435);
            $loc->setYaxe(10.158705);
            $loc->setAdresse("Tunis");
            $em->persist($loc);
            $em->flush();
        }
        if($city == "Gabes")
        {
            $loc->setIdRelai($relai);
            $loc->setXaxe(33.891771);
            $loc->setYaxe(10.099139);
            $loc->setAdresse("Gabes");
            $em->persist($loc);
            $em->flush();
        }
        if($city == "Sousse")
        {
            $loc->setIdRelai($relai);
            $loc->setXaxe(35.834312);
            $loc->setYaxe(10.619770);
            $loc->setAdresse("Sousse");
            $em->persist($loc);
            $em->flush();
        }
        if($city == "Ariana")
        {
            $loc->setIdRelai($relai);
            $loc->setXaxe(36.891415);
            $loc->setYaxe(10.183156);
            $loc->setAdresse("Ariana");
            $em->persist($loc);
            $em->flush();
        }
        if($city == "Sfax")
        {
            $loc->setIdRelai($relai);
            $loc->setXaxe(34.748109);
            $loc->setYaxe(10.734812);
            $loc->setAdresse("Sfax");
            //36.834435, 10.158705
            $em->persist($loc);
            $em->flush();
        }
        if($city == "Beja")
        {
            $loc->setIdRelai($relai);
            $loc->setXaxe(36.730809);
            $loc->setYaxe(9.183482);
            $loc->setAdresse("Beja");
            //36.834435, 10.158705
            $em->persist($loc);
            $em->flush();
        }
        if($city == "Gafsa")
        {
            $loc->setIdRelai($relai);
            $loc->setXaxe(34.427315);
            $loc->setYaxe(8.778810);
            $loc->setAdresse("Gafsa");
            //36.834435, 10.158705
            $em->persist($loc);
            $em->flush();
        }
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
