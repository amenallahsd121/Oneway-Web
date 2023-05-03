<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;

class UserFormType extends AbstractType
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
            ->add('birthdate',DateType::class)
            
            ->add('password',TextareaType::class,[
                "attr"=>[
                    "class" => "form-control ",
                    
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
