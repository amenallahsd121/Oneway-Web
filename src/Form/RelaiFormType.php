<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RelaiFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name',TextareaType::class,[
            "attr"=>[
                "class" => "form-control"
            ]
        ])
        ->add('lastname',TextareaType::class,[
            "attr"=>[
                "class" => "form-control"
            ]
        ])
        ->add('email',EmailType::class,[
            "attr"=>[
                "class" => "form-control"
            ]
        ])
        ->add('adresse',TextareaType::class,[
            "attr"=>[
                "class" => "form-control"
            ]
        ])
        ->add('city',TextareaType::class,[
            "attr"=>[
                "class" => "form-control"
            ]
        ])
        ->add('number',TextareaType::class,[
            "attr"=>[
                "class" => "form-control ",
                
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
