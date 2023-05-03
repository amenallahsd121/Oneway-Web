<?php

namespace App\Form;

use App\Entity\Offre;
use App\Entity\Trajetoffre;
use App\Entity\Categorieoffre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Range;
use VictorPrdh\RecaptchaBundle\Form\ReCaptchaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descriptionoffre', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'La description est obligatoire.']),
                    new Length([
                        'min' => 3,
                        'max' => 255,
                        'minMessage' => 'La description doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'La description doit contenir au maximum {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('maxretard', IntegerType::class, [
                'constraints' => [
                ],
            ])
            ->add('prixoffre', MoneyType::class, [
                'currency' => 'DT',
                'constraints' => [
                    new NotBlank(['message' => 'Le prix est obligatoire.']),
                    new Positive(['message' => 'Le prix doit être un nombre positif.']),
                    new Range([
                        'min' => 5,
                        'minMessage' => 'Le prix doit être supérieur à 5 DT.',
                    ]),],
            ])
            ->add('datesortieoffre', DateType::class, [
                'required' => false,
                'widget' => 'single_text',

              
                'constraints' => [
                    new GreaterThan('today'),
                    new NotBlank(['message' => 'Le Date est obligatoire.']),
                ],
            ])
            ->add('catoffreid', EntityType::class, [
                'class' => Categorieoffre::class,
                'choice_label' => 'typeoffre',
                'constraints' => [
                    new NotBlank(['message' => 'La catégorie d\'offre est obligatoire.']),
                ],
            ])
            ->add('idtrajetoffre', EntityType::class, [
                'class' => Trajetoffre::class,
                'choice_label' => 'description',
                'choice_value' => 'idtrajetoffre', // Assuming 'id' is the property representing the unique identifier of Trajetoffre

                'constraints' => [
                    new NotBlank(['message' => 'Le trajet est obligatoire.']),
                ],
            ])
           ->add("recaptcha", ReCaptchaType::class)

            ->add('save', SubmitType::class, ['label' => 'Enregister']) ;
    }
 


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
