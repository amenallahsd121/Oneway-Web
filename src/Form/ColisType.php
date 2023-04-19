<?php

namespace App\Form;

use App\Entity\Colis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class ColisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('poids')
            ->add('prix')
            ->add('typeColis', ChoiceType::class, [
                'choices' => [
                    'Agro-Alimentaire' => 'Agro-Alimentaire',
                    'Matériel Electronique' => 'Matériel Electronique',
                    'Meubles' => 'Meubles',
                    'Pièces Automobiles' => 'Pièces Automobiles',
                ],
                 ])
            
            



            ->add('lieuDepart', ChoiceType::class, [
                'choices' => [
                    'Ariana' => 'Ariana',
                    'Bizerte' => 'Bizerte',
                    'Gabès' => 'Gabès',
                    'Gafsa' => 'Gafsa',
                    'Jendouba' => 'Jendouba',
                    'Kairouan' => 'Kairouan',
                    'Kasserine' => 'Kasserine',
                    'Kébili' => 'Kébili',
                    'Kef' => 'Kef',  
                    'Monastir' => 'Monastir',
                    'Nabeul' => 'Nabeul',
                    'Sfax' => 'Sfax',
                    'Sousse' => 'Sousse', 
                    'Tunis' => 'Tunis',
                    'Zaghouan' => 'Zaghouan',

                ],
            ])






            ->add('lieuArrive', ChoiceType::class, [
                'choices' => [
                    'Ariana' => 'Ariana',
                    'Bizerte' => 'Bizerte',
                    'Gabès' => 'Gabès',
                    'Gafsa' => 'Gafsa',
                    'Jendouba' => 'Jendouba',
                    'Kairouan' => 'Kairouan',
                    'Kasserine' => 'Kasserine',
                    'Kébili' => 'Kébili',
                    'Kef' => 'Kef',  
                    'Monastir' => 'Monastir',
                    'Nabeul' => 'Nabeul',
                    'Sfax' => 'Sfax',
                    'Sousse' => 'Sousse', 
                    'Tunis' => 'Tunis',
                    'Zaghouan' => 'Zaghouan',


                ],

            ])

            ->add('Ajouter', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Colis::class,
        ]);
    }





}
