<?php

namespace App\Form;

use App\Entity\Offre;
use App\Entity\Trajetoffre;
use App\Entity\Categorieoffre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descriptionoffre')
            ->add('maxretard')
            ->add('prixoffre')
            ->add('datesortieoffre' , DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => [
                    'data-date-format' => 'yyyy-mm-dd',
                ],
            ])
            ->add('catoffreid', EntityType::class, [
                'class' => Categorieoffre::class,
                'choice_label' => function ($catoffreid) {
                    return $catoffreid->getTypeoffre();
                },
              
                
                ])
            ->add('idtrajetoffre' , EntityType::class, [
                'class' => Trajetoffre::class,
                'choice_label' => function ($idtrajetoffre) {
                    return $idtrajetoffre->getDescription();
                    
                   
                    
                }
                ])
                ->add('save', SubmitType::class, ['label' => 'Save'])

        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
