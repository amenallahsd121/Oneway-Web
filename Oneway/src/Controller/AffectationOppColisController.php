<?php

namespace App\Controller;

use App\Entity\Colis;
use App\Entity\Opportinute;
use App\Entity\Affectationopcolis;
use App\Form\AffectationopcolisType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AffectationOppColisController extends AbstractController
{

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/affectation', name: 'app_affectation')]
    public function indexparticipation(): Response
    {
        $data = $this->getDoctrine()->getRepository(Affectationopcolis::class)->findAll();
        return $this->render('\affectation_opp_colis\affect.html.twig', [
            'list' => $data   
        ]);
    }



   #[Route('/affectation/opportinute', name: 'app_affectation_opportinute')]
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        
        $list= $entityManager->getRepository(Opportinute::class)->findAll();
        $pagination = $paginator->paginate( $list , $request->query->getInt('page', 1 ), 3);  

       
        return $this->render('\affectation_opp_colis\index.html.twig', [
            'list' => $pagination   
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

        

        #[Route('/affectation/delete/{idk}', name: 'delete_Affectation')]
        public function delete($idk) {
         
         
           
            $data = $this->getDoctrine()->getRepository(Affectationopcolis::class)->find($idk); 
        
              $em = $this->getDoctrine()->getManager();
              $em->remove($data);
              $em->flush();
        
        
          
        
              return $this->redirectToRoute('app_affectation_opportinute');
          }
          #[Route('/affectationn/delete/{idi}', name: 'delete_Affectationn')]
          public function delete2($idi) {
           
           
             
              $data = $this->getDoctrine()->getRepository(Affectationopcolis::class)->find($idi); 
          
                $em = $this->getDoctrine()->getManager();
                $em->remove($data);
                $em->flush();
          
          
            
          
                return $this->redirectToRoute('app_affectation');
            }
  

      
}
