<?php

namespace App\Form;

use App\Entity\Demande;
use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class Demande1Type extends AbstractType
{

  

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descriptiondemande', TextareaType::class)
            ->add('prix');
           
       
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
            'idpersonne' => null,
        ]);
    }
}