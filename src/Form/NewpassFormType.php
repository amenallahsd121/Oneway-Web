<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class NewpassFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('password',TextareaType::class,[
            "attr"=>[
                "class" => "form-control"
            ]
            ,"constraints" => [
                new Assert\Regex([
                    'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                    'message' => 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
                ]),
            ],
        ])    
        
        ->add('Rpassword',TextareaType::class,[
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
