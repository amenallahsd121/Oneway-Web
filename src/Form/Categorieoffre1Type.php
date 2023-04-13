<?php namespace App\Form;

use App\Entity\Categorieoffre;
use Symfony\Component\Form\FormError;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Unique;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints\Callback;
class Categorieoffre1Type extends AbstractType
{ 
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {        
        $builder
            ->add('poidsoffre', NumberType::class, [
                'scale' => 2,
                'attr' => [
                    'inputmode' => 'float',
                    'step' => '0.01',
                    'placeholder' => 'Entrez un poids par colis en kg (ex: 2.5)',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le poids est obligatoire.']),
                    new Type([
                        'type' => 'float',
                        'message' => 'Le poids doit être un nombre décimal.'
                    ]),
                    new Range([
                        'min' => 0.01,
                        'max' => 99.99,
                        'minMessage' => 'Le poids doit être supérieur à 0.01 kg.',
                        'maxMessage' => 'Le poids doit être inférieur à 99.99 kg.',
                    ]),
                ]
            ])
            ->add('nbrecolisoffre', NumberType::class, [
                'scale' => 0,
                'attr' => [
                    'inputmode' => 'numeric',
                    'placeholder' => 'Entrez le nombre de colis maximum par offre (ex: 15 colis)',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le nombre de colis est obligatoire.']),
                    new Type([
                        'type' => 'int',
                        'message' => 'Le nombre de colis doit être un nombre entier.'
                    ]),
                    new Range([
                        'min' => 1,
                        'max' => 20,
                        'minMessage' => 'Le nombre de colis doit être supérieur à 1.',
                        'maxMessage' => 'Le nombre de colis doit être inférieur à 25.',
                    ]),
                ]
            ])
            ->add('typeoffre', TextType::class, [
                'attr' => [
                    'inputmode' => 'text',
                    'placeholder' => 'Entrez le type d\'offre (ex: XS / S / M / L)',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le type d\'offre est obligatoire.']),
                    new Type([
                        'type' => 'string',
                        'message' => 'Le type d\'offre doit être une chaîne de caractères.'
                    ]),
                    new Length([
                        'min' => 1,
                        'max' => 2,
                        'exactMessage' => 'Le type d\'offre doit être composé au maximum  de 2 caractères.',
                    ]),
                    new Callback(function ($value, ExecutionContextInterface $context) {
                        $form = $context->getRoot();
                        $categoryOffer = $form->getData();
            
                        $existingCategoryOffer = $this->entityManager
                            ->getRepository(Categorieoffre::class)
                            ->findOneBy(['typeoffre' => $value]);
            
                        if ($existingCategoryOffer && $existingCategoryOffer !== $categoryOffer) {
                            $context->buildViolation('Ce type d\'offre existe déjà.')
                                ->atPath('typeoffre')
                                ->addViolation();
                        }
                    }),
                ]
            ])
        ;
    }
        

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Categorieoffre::class,
        ]);
    }
}
