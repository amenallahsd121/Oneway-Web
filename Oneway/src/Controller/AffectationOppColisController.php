<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Affectationopcolis;
use App\Entity\Colis;
use App\Entity\Opportinute;
use App\Form\AffectationopcolisType;
use Doctrine\ORM\EntityManagerInterface;
class AffectationOppColisController extends AbstractController
{

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }




   #[Route('/affectation/opportinute', name: 'app_affectation_opportinute')]
    public function index(): Response
    {
        $data = $this->getDoctrine()->getRepository(Opportinute::class)->findAll();
       
        return $this->render('\affectation_opp_colis\index.html.twig', [
            'list' => $data   
        ]);
       
    }


    #[Route('/affectation/add/{ida}', name: 'add_affectation')]
    public function addparticipation($ida , ManagerRegistry $doctrine,Request $req): Response {
        
        $em = $doctrine->getManager();
        $aff = new Affectationopcolis();
        $form = $this->createForm(AffectationopcolisType::class,$aff);
        $form->handleRequest($req);
        $opp = $this->entityManager->getRepository(Opportinute::class)->find($ida);
        $aff->setRelation($opp);

        if($form->isSubmitted()) {
        dump('ok');

        $this->entityManager->persist($aff);
        $this->entityManager->flush();



            $em->persist($aff);
            $em->flush();
            return $this->redirectToRoute('app_affectation_opportinute');
        }

            return $this->renderForm('\affectation_opp_colis\Remplir.html.twig', [
                'form' => $form   
            ]);
            
        }

        

        #[Route('/affectation/delete/{idp}', name: 'delete_affectation')]
        public function delete($idp) {
         
         
           
            $data = $this->getDoctrine()->getRepository(Affectationopcolis::class)->find($idp); 
        
              $em = $this->getDoctrine()->getManager();
              $em->remove($data);
              $em->flush();
        
        
          
        
              return $this->redirectToRoute('app_affectation_opportinute');
          }


      
}
