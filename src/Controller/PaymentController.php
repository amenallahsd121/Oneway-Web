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
use Twilio\Rest\Client;






class PaymentController extends AbstractController
{


    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
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
        $poids = $colis->getPoids();
        $lieudepart = $colis->getLieuDepart();
        $lieuarrive = $colis->getLieuArrive();
        $emailc = $user->getEmail();


        ////////////////////////////////////////////////////////////////

        // Create a Transport object
        $transport = Transport::fromDsn('smtp://oneway.noreplay@gmail.com:ruhgodtwnckgjezy@smtp.gmail.com:465');

        // Create a Mailer object
        $mailer = new Mailer($transport);

        // Create an Email object
        $email = (new Email());

        // Set the "From address"
        $email->from('oneway.noreplay@gmail.com');

        // Set the "To address"
        $email->to($emailc);

        // Set a "subject"
        $email->subject('Validation Paiement !');

        // Set the plain-text "Body"
        // $email->text('Test Recu Mail.');

        // Set HTML "Body"
        $email->html('
        <div style="border:2px solid green; padding:20px; font-family: Arial, sans-serif;">
          <img src="data:image/png;base64,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" alt="Logo" style="max-width: 200px; float: right;">
          <h1 style="color:#006600; margin-top:0;">Bonjour ' . $nom . ' ' . $prenom . '</h1>  
          <p style="font-size:18px;">Site Oneway vous remercie pour votre achat.</p>
          <p style="font-size:18px;">Votre Paiement de ' .$prix. ' DT est Approuvé</p> 
          <p style="font-size:18px;">Votre colis de type ' . $type . ' pesant ' . $poids . ' kg sera livré dans un délai de 24 heures.</p>
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



        $twilionumber = "+16073885845";
        
        $client = new Client('AC954042c1468214186635e317b0d82cea', '831eb539737a03327f83cb791f8782c0');
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            '+21626378786',
            array(
                'from' => $twilionumber,
                'body' => 'Votre Paiement de ' .$prix. ' DT est Approuvé , Votre Colis de Type ' .$type . ' Sera Livré Dans 24H , Mr/Mme: '. $prenom . ' Merci d etre Avec Nous !!'
            )
        );



        return $this->render('payment/success.html.twig', []);
    }






    #[Route('/cancel-url', name: 'cancel_url')]
    public function cancelUrl(): Response
    {
        return $this->render('payment/cancel.html.twig', []);
    }
}
