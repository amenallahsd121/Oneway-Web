<?php

namespace App\Form;

use App\Entity\Demande;
use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class Demande1Type extends AbstractType
{

  

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descriptiondemande', TextareaType::class, [
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
            ->add('prix', MoneyType::class, [
                'currency' => 'DT',
                'constraints' => [
                    new NotBlank(['message' => 'Le prix est obligatoire.']),
                    new Positive(['message' => 'Le prix doit être un nombre positif.']),
                    new Range([
                        'min' => 5,
                        
                        'minMessage' => 'Le prix doit être supérieur à 5 DT.',
                    ]),],
            ]);
           
       
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
            'idpersonne' => null,
        ]);
    }
}