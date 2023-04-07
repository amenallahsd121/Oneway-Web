<?php

namespace App\Form;

use App\Entity\Trajetoffre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrajetoffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('limitekmoffre')
            ->add('addarriveoffre')
            ->add('adddepartoffre')
            ->add('nbreescaleoffre')
            ->add('nbreoffre')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trajetoffre::class,
        ]);
    }
}
