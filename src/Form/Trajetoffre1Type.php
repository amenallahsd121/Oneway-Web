<?php

namespace App\Form;

use App\Entity\Trajetoffre;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class Trajetoffre1Type extends AbstractType
{  private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('limitekmoffre', IntegerType::class, [
            'constraints' => [
                new IsTrue([
                    'message' => 'La limite de km doit être un nombre entier.',
                    'callback' => function ($value) {
                        return is_int($value);
                    }]),
                new NotBlank(['message' => 'La limite de km est obligatoire.']),
                new Type([
                    'type' => 'integer',
                    'message' => 'La limite de km doit être un nombre entier.'
                ]),
                new Positive(['message' => 'La Distance doit être un nombre positif.']),
            ]
        ])
        ->add('adddepartoffre', TextType::class, [
            'constraints' => [
                new NotBlank(['message' => 'L\'adresse de départ est obligatoire.']),
                new Length([
                    'min' => 3,
                    'max' => 255,
                    'minMessage' => 'L\'adresse de départ doit contenir au moins {{ limit }} caractères.',
                    'maxMessage' => 'L\'adresse de départ doit contenir au maximum {{ limit }} caractères.',
                ]),
                new Callback([$this, 'validateAddOffre']),

            ]
        ])
        ->add('addarriveoffre', TextType::class, [
            'constraints' => [
                new NotBlank(['message' => 'L\'adresse d\'arrivée est obligatoire.']),
                new Length([
                    'min' => 3,
                    'max' => 255,
                    'minMessage' => 'L\'adresse d\'arrivée doit contenir au moins {{ limit }} caractères.',
                    'maxMessage' => 'L\'adresse d\'arrivée doit contenir au maximum {{ limit }} caractères.',
                ]),
                new Callback(function ($value, ExecutionContextInterface $context) use ($builder) {
                    $form = $builder->getForm();
                    $addArrivee = $form->get('adddepartoffre')->getData();
    
                    if ($value === $addArrivee) {
                        $context->buildViolation('Le lieu de départ ne doit pas être identique au lieu d\'arrivée.')
                            ->addViolation();
                    }
                }),
            ]
        ])
      
        ->add('nbreescaleoffre', IntegerType::class, [
            'constraints' => [
                new Type([
                    'type' => 'integer',
                    'message' => 'Le nombre d\'escales doit être un nombre entier.'
                ]),
                new Positive(['message' => 'Le nombre d\'escales doit être un nombre positif ou zéro.']),
            ]
        ])



        ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            $trajetoffre = $event->getData();
            $form = $event->getForm();
        
            if ($trajetoffre instanceof Trajetoffre && $form->isValid()) {
                $trajetoffre->setDescription();
            }
        });
}

        
public function validateAddOffre($value, ExecutionContextInterface $context)
{
    $form = $context->getRoot();
    $addArrivee = $form->get('addarriveoffre')->getData();
    $addDepart = $value;

    if ($addDepart && $addArrivee) {
        $trajetOffreRepository = $this->entityManager->getRepository(Trajetoffre::class);
        $existingTrajetOffre = $trajetOffreRepository->findOneBy(['adddepartoffre' => $addDepart, 'addarriveoffre' => $addArrivee]);

        if ($existingTrajetOffre) {
            $context->buildViolation('Une offre de trajet avec cette adresse de départ et d\'arrivée existe déjà.')
                ->atPath('adddepartoffre')
                ->addViolation();
        }
    }
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trajetoffre::class,
            'empty_data' => new Trajetoffre('', '', ''),

        ]);
    }
}
