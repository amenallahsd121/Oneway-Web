<?php

namespace App\Form;

use App\Entity\Livreur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LivreurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cinLivreur')
            ->add('nom')
            ->add('prenom')
            ->add('vehicule', ChoiceType::class, [
                'choices' => [
                    'Partner' => 'Partner',
                    'ISUZU' => 'ISUZU',
                    'Volvo' => 'Volvo',
                    'Berlingo' => 'Berlingo',
                ],
               
            ])

            ->add('Ajouter', SubmitType::class);
           
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livreur::class,
        ]);
    }
}
