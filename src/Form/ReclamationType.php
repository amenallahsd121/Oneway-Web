<?php

namespace App\Form;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder


            ->add('sujet', ChoiceType::class, [
                'choices' => [
                    'Service' => 'Service',
                    'Livreur' => 'Livreur',
                    'Retard de livraison' => 'Retard de livraison',
                    'Autres' => 'Autres',
                ],
            ])
            ->add('text_rec')
            ->add('Reclamer', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
