<?php

namespace App\Form;

use App\Entity\Colis;
use App\Entity\Affectationopcolis;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class AffectationopcolisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $userId = 68; 
        
        $builder
            ->add('id_colis', HiddenType::class, [ // add a hidden field to store the id of the selected Colis entity
                'mapped' => false,
            ])
            ->add('joinColis', EntityType::class, [
                'class' => Colis::class,
                'query_builder' => function(EntityRepository $er) use ($userId) {
                    return $er->createQueryBuilder('c')
                        ->where('c.id_client = :userId')
                        ->setParameter('userId', $userId);
                },
                'choice_label' => 'type_colis',
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
