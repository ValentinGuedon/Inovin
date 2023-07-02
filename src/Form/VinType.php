<?php

namespace App\Form;

use App\Entity\Vin;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class VinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [])
            ->add('description', TextType::class, [])
            ->add('region', TextType::class, [])
            ->add('millesime', IntegerType::class, [])
            ->add('degreAlcool', IntegerType::class, [])
            ->add('prix', IntegerType::class, [])
            ->add('profil', null, ['choice_label' => 'name'])
            ->add('posterFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
            ])
            ->add('couleur', ChoiceType::class, [
                'choices' => [
                    'rouge' => 'rouge',
                    'blanc' => 'blanc',
                ],
                'placeholder' => 'Choisissez la couleur',
                'required' => true,
            ])
            ->add('limpidite', ChoiceType::class, [
                'choices' => [
                    'limpide' => 'limpide',
                    'voilé' => 'voilé',
                    'trouble' => 'trouble',
                    'flou' => 'flou',
                ],
                'placeholder' => 'Choisissez une limpidité',
                'required' => true,
            ])
            ->add('fluidite', ChoiceType::class, [
                'choices' => [
                    'visqueuse' => 'visqueuse',
                    'grasse' => 'grasse',
                    'épaisse' => 'epaisse',
                    'coulante' => 'coulante',
                    'fluide' => 'fluide',
                ],               'placeholder' => 'Choisissez une fluidité',
                'required' => true,
            ])
            ->add('arome', ChoiceType::class, [
                'choices' => [
                    'fruité' => 'fruite',
                    'animal' => 'animal',
                    'épicé' => 'epice',
                    'floral' => 'floral',
                    'végétal' => 'vegetal',
                    'marin' => 'marin',
                ],
                'placeholder' => 'Choisissez un arôme',
                'required' => true,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('douceur', NumberType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 10,

                ],'label' => 'Choisissez une douceur /10',
            ])
            ->add('alcool', NumberType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 10,
                ],'label' => "Choisissez un ressenti d'alcool/10"
            ])
            ->add('persistance', ChoiceType::class, [
                'choices' => [
                    'courte' => 'courte',
                    'moyenne' => 'moyenne',
                    'persistante' => 'persistante',
                ],
                'placeholder' => 'Choisissez une persistance',
                'required' => true,
            ])
            ->add('structure', ChoiceType::class, [
                'choices' => [
                    'légère' => 'legere',
                    'fluide' => 'fluide',
                    'charpentée' => 'charpente',
                ],
                'placeholder' => 'Choisissez une persistance',
                'required' => true,
            ])
            ->add('matiere', ChoiceType::class, [
                'choices' => [
                    'massive' => 'massive',
                    'étoffée' => 'etoffee',
                    'légère' => 'legere',
                    'fluette' => 'fluette',
                ], 'placeholder' => 'Choisissez un arôme',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vin::class,
        ]);
    }
}
