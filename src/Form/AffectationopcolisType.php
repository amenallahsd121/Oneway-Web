<?php

namespace App\Form;

use App\Entity\Affectationopcolis;
use App\Entity\Colis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class AffectationopcolisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('joinColis', EntityType::class, [
            'class' => Colis::class,
            'choice_label' => 'id_colis',
            'multiple' => false,
            'expanded' => false,
        ])
        ->add('Ajouter', SubmitType::class);
          
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Affectationopcolis::class,
        ]);
    }
}
