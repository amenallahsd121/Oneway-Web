<?php

namespace App\Controller;

use Stripe\Stripe;
use App\Entity\Colis;
use Stripe\Checkout\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;


class PaymentController extends AbstractController
{


    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/payment', name: 'payment')]
    public function index(): Response
    {
        return $this->render('payment/index.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
    }


    #[Route('/checkout/{id}', name: 'checkout')]
    public function checkout($id): Response
    {
        Stripe::setApiKey("sk_test_51MiH0TA3Jv9j1LNNcAl6SbKr1PDUysvKLKK6AdjP3eCFPtBSEwG9rqr7cavim0dFSDHorGx2XyxUlmqy1y9tsm3x00rMOWACN5");
        $colis = $this->getDoctrine()->getRepository(Colis::class)->find($id);
        $prix = $colis->getprix();

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Colis',
                        ],
                        'unit_amount'  => ($prix) * 100,
                    ],
                    'quantity'   => 1,
                ]
            ],
            'mode'                 => 'payment',
            'success_url'          => $this->generateUrl('success_url',   ['id' => $id], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url'           => $this->generateUrl('cancel_url', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);

        return $this->redirect($session->url, 303);
    }









    #[Route('/success-url', name: 'success_url')]
    public function successUrl(ManagerRegistry $doctrine, Request $request): Response
    {

        $em = $doctrine->getManager();
        $id = $request->query->get('id');
        $colis = $this->getDoctrine()->getRepository(Colis::class)->find($id);


        $currentTypeColis = $colis->getTypeColis();
        $newTypeColis = $currentTypeColis . '.';
        $colis->setTypeColis($newTypeColis);

        $this->entityManager->persist($colis);
        $this->entityManager->flush();

        $em->persist($colis);
        $em->flush();

        return $this->render('payment/success.html.twig', []);
    }


    #[Route('/cancel-url', name: 'cancel_url')]
    public function cancelUrl(): Response
    {
        return $this->render('payment/cancel.html.twig', []);
    }
}
