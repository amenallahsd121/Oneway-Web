<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UserFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function ajoutUserAction(Request $request,ManagerRegistry $Doctrine)
    {
        $user = new Utilisateur();
        $form = $this->createForm(UserFormType::class,$user);
        $form ->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $Doctrine->getmanager();
            $em->persist($user);
            $em->flush();
        }

        return $this->render("user/index.html.twig",array('form'=>$form->createView()));

    }

    #[Route('/afficher', name: 'aff_user')]
    public function afficherUsers(ManagerRegistry $Doctrine)
    {
        $em = $Doctrine->getManager();
        $user = $em->getRepository(Utilisateur::class)->findAll();
        return $this->render("user/userView.html.twig",array('user' =>$user));

    }

    #[Route('/user/{id}/delete', name: 'user_delete')]
    public function delete(Utilisateur $user, ManagerRegistry $Doctrine): RedirectResponse
    {
        $em =$Doctrine->getManager();
        $em->remove($user);
        $em->flush();
        
        return $this->redirectToRoute("aff_user");

    }
    #[Route('/user/{id}/edit', name: 'user_edit')]
    public function edit(Utilisateur $user, Request $request, ManagerRegistry $Doctrine) 
    {
        $form = $this->createForm(UserFormType::class , $user);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $em = $Doctrine->getManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render("user/editUser.html.twig",[
            "form" =>$form->createView()
        ]);

    }

}
