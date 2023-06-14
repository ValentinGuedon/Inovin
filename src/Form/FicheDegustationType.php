<?php

namespace App\Form;

use App\Entity\FicheDegustation;
use App\Entity\Vin;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

/**
 * @SuppressWarnings(PHPCPD)
 */
class FicheDegustationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // $builder
        // ->add('couleur',ChoiceType::class, [
        //     'choices' => [
        //         'framboise' => 'limpide',
        //         'cerise' => 'voilé',
        //         'rubis' => 'trouble',
        //         'pourpre' => 'flou',
        //     ],
        //     'placeholder' => 'Choisissez une limpidité',
        //     'required' => true,
        // ])
        //     ->add('limpidite', ChoiceType::class, [
        //         'choices' => [
        //             'limpide' => 'limpide',
        //             'voilé' => 'voilé',
        //             'trouble' => 'trouble',
        //             'flou' => 'flou',
        //         ],
        //         'placeholder' => 'Choisissez une limpidité',
        //         'required' => true,
        //     ])
        //     ->add('fluidite', ChoiceType::class, [
        //         'choices' => [
        //             'visqueuse' => 'visqueuse',
        //             'grasse' => 'grasse',
        //             'épaisse' => 'epaisse',
        //             'coulante' => 'coulante',
        //             'fluide' => 'fluide',
        //         ],               'placeholder' => 'Choisissez une fluidité',
        //         'required' => true,
        //     ])
        //     ->add('arome', ChoiceType::class, [
        //         'choices' => [
        //             'fruité' => 'fruite',
        //             'animal' => 'animal',
        //             'épicé' => 'epice',
        //             'floral' => 'floral',
        //             'végétal' => 'vegetal',
        //             'marin' => 'marin',
        //         ],
        //         'placeholder' => 'Choisissez un arôme',
        //         'required' => true,
        //         'multiple' => true,
        //         'expanded' => true,
        //     ])
        //     ->add('brillance', NumberType::class, [
        //         'attr' => [
        //             'min' => 0,
        //             'max' => 10,

        //         ],'label' => 'Choisissez une brillance /10',
        //     ])
        //     ->add('arome', ChoiceType::class, [
        //         'choices' => [
        //             'fruité' => 'fruite',
        //             'animal' => 'animal',
        //             'épicé' => 'epice',
        //             'floral' => 'floral',
        //             'végétal' => 'vegetal',
        //             'marin' => 'marin',
        //         ],
        //         'placeholder' => 'Choisissez un arôme',
        //         'required' => true,
        //         'multiple' => true,
        //         'expanded' => true,
        //     ])
        //     ->add('intensite', NumberType::class, [
        //         'attr' => [
        //             'min' => 0,
        //             'max' => 10,

        //         ],'label' => 'Choisissez une intensité /10',
        //     ])
        //     ->add('douceur', NumberType::class, [
        //         'attr' => [
        //             'min' => 0,
        //             'max' => 10,

        //         ],'label' => 'Choisissez une douceur /10',
        //     ])
        //     ->add('alcool', NumberType::class, [
        //         'attr' => [
        //             'min' => 0,
        //             'max' => 10,
        //         ],'label' => "Choisissez un ressenti d'alcool/10"
        //     ])
        //     ->add('persistance', ChoiceType::class, [
        //         'choices' => [
        //             'courte' => 'courte',
        //             'moyenne' => 'moyenne',
        //             'persistante' => 'persistante',
        //         ],
        //         'placeholder' => 'Choisissez une persistance',
        //         'required' => true,
        //     ])
        //     ->add('structure', ChoiceType::class, [
        //         'choices' => [
        //             'légère' => 'legere',
        //             'fluide' => 'fluide',
        //             'charpentée' => 'charpente',
        //         ],
        //         'placeholder' => 'Choisissez une persistance',
        //         'required' => true,
        //     ])
        //     ->add('matiere', ChoiceType::class, [
        //         'choices' => [
        //             'massive' => 'massive',
        //             'étoffée' => 'etoffee',
        //             'légère' => 'legere',
        //             'fluette' => 'fluette',
        //         ], 'placeholder' => 'Choisissez un arôme',
        //         'required' => true,
        //     ])
        //     ->add('emotion', ChoiceType::class, [
        //         'choices' => [
        //             'Joie' => 'joie',
        //             'Satisfaction' => 'etoffee',
        //             'Étonnement' => 'etonnement',
        //             'Ennui' => 'ennui',
        //             'Dêgout' => 'dêgout',
        //         ], 'placeholder' => 'Choisissez un arôme',
        //         'required' => true,
        //     ])
        //     ->add('note')
        //     ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheDegustation::class,
        ]);
    }
}
