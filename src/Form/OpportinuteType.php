<?php

namespace App\Form;

use App\Entity\Opportinute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OpportinuteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, array(
                'widget' => 'single_text',
            ))
            ->add('depart')
            ->add('heurDepart')
            ->add('arrivee')
            ->add('heurArrivee')
            ->add('description')
            ->add('Ajouter', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Opportinute::class,
        ]);
    }
}
