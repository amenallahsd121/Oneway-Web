<?php

namespace App\Controller;

use Stripe\Stripe;
use App\Entity\Colis;
use Stripe\Checkout\Session;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;






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
    public function successUrl(ManagerRegistry $doctrine, Request $request, MailerInterface $mailer): Response
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


        /////////////////////////////////////////////////////////////

        $user = $colis->getIdUtilisateur();
        $prenom = $user->getName();
        $nom = $user->getLastname();


        ///////////////////////////////////////////////////////////////

        $prix = $colis->getPrix();
        $type = $colis->getTypeColis();
        $lieudepart = $colis->getLieuDepart();
        $lieuarrive = $colis->getLieuArrive();


        ////////////////////////////////////////////////////////////////

        // Create a Transport object
        $transport = Transport::fromDsn('smtp://amenallahbensmida@gmail.com:ywknolqnmfbxtvik@smtp.gmail.com:465');

        // Create a Mailer object
        $mailer = new Mailer($transport);

        // Create an Email object
        $email = (new Email());

        // Set the "From address"
        $email->from('amenallahbensmida@gmail.com');

        // Set the "To address"
        $email->to(
            'amenallah.bensmida@esprit.tn'

        );



        // Set a "subject"
        $email->subject('Validation Paiement !');

        // Set the plain-text "Body"
        $email->text('Test Recu Mail.');

        // Set HTML "Body"
        $email->html('
        <div style="border:2px solid green; padding:20px; font-family: Arial, sans-serif;">
          <img src="../../public/assets/img/logo/logo.png" alt="Logo" style="max-width: 200px; float: right;">
          <h1 style="color:#006600; margin-top:0;">Bonjour ' . $nom . ' ' . $prenom . '</h1>  
          <p style="font-size:18px;">Site Oneway vous remercie pour votre achat.</p>
          <p style="font-size:18px;">Votre colis de type ' . $type . ' pesant ' . $prix . ' kg sera livré dans un délai de 24 heures.</p>
          <p style="font-size:18px;">Lieu de départ : ' . $lieudepart . '</p>
          <p style="font-size:18px;">Lieu d\'arrivée : ' . $lieuarrive . '</p>
          <div class="d-flex justify-content-center">
          <span class="bi bi-truck" style="font-size: 4rem;"></span>
        </div>
        
          <p style="font-size:18px;">Pour plus d\'informations, n\'hésitez pas à nous contacter.</p>
          <a href="#" style="display:inline-block; margin-top:20px; padding:10px 20px; background-color:#006600; color:#fff; text-decoration:none; border-radius:5px;">Nous contacter</a>
        </div>
      ');



        // Sending email with status
        try {
            // Send email
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
        }

        return $this->render('payment/success.html.twig', []);
    }






    #[Route('/cancel-url', name: 'cancel_url')]
    public function cancelUrl(): Response
    {
        return $this->render('payment/cancel.html.twig', []);
    }
}
