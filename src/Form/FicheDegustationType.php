<?php

namespace App\Form;

use App\Entity\FicheDegustation;
use App\Entity\Vin;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FicheDegustationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('couleur', ChoiceType::class, [
            'choices' => [
                'Framboise' => 'framboise',
                'Cerise' => 'cerise',
                'Rubis' => 'rubis',
                'Pourpre' => 'pourpre',
                'Violet' => 'violet',
                'Grenat' => 'grenat',
                'Tuilé' => 'tuilé',

                'Or vert' => 'or vert',
                'Or pâle' => 'or pâle',
                'Jaune paille' => 'jaune paille',
                'Doré' => 'doré',
                'Vieil or' => 'vieil or',
                'Ambré' => 'ambré',
                'Roux' => 'roux',
            ],
            'choice_attr' => function ($choice) {
                $colors = [
                    'framboise' => [
                        'value' => 'framboise',
                        'class' => 'checkbox-framboise',
                    ],
                    'cerise' => [
                        'value' => 'cerise',
                        'class' => 'checkbox-cerise',
                    ],
                    'rubis' => [
                        'value' => 'rubis',
                        'class' => 'checkbox-rubis',
                    ],
                    'pourpre' => [
                        'value' => 'pourpre',
                        'class' => 'checkbox-pourpre',
                    ],
                    'violet' => [
                        'value' => 'violet',
                        'class' => 'checkbox-violet',
                    ],
                    'grenat' => [
                        'value' => 'grenat',
                        'class' => 'checkbox-grenat',
                    ],
                    'tuilé' => [
                        'value' => 'tuilé',
                        'class' => 'checkbox-tuilé',
                    ],

                    'or vert' => [
                        'value' => 'or vert',
                        'class' => 'checkbox-vert',
                    ],

                    'or pâle' => [
                        'value' => 'or pâle',
                        'class' => 'checkbox-pâle',
                    ],

                    'jaune paille' => [
                        'value' => 'jaune paille',
                        'class' => 'checkbox-jaune',
                    ],

                    'doré' => [
                        'value' => 'doré',
                        'class' => 'checkbox-doré',
                    ],

                    'vieil or' => [
                        'value' => 'vieil or',
                        'class' => 'checkbox-or',
                    ],

                    'ambré' => [
                        'value' => 'ambré',
                        'class' => 'checkbox-ambré',
                    ],
                    'roux' => [
                        'value' => 'roux',
                        'class' => 'checkbox-roux',
                    ],
                ];
                return ['class' => $colors[$choice]['class']];
            },
            'required' => true,
            'expanded' => true,
        ])

        ->add('limpidite', RangeType::class, [
            'label' => 'Limpidité',
            'attr' => [
                'min' => 1,
                'max' => 4,
                'value' => 1,
                'class' => 'custom-range',
            ],
        ])
        ->add('persistance', RangeType::class, [
            'label' => 'Persistance',
            'attr' => [
                'min' => 1,
                'max' => 4,
                'value' => 1,
                'class' => 'custom-range',
            ],
        ])
        ->add('brillance', RangeType::class, [
            'label' => 'Brillance',
            'attr' => [
                'min' => 1,
                'max' => 10,
                'value' => 1,
                'class' => 'horizontal-range brillance',
                'id' => 'brillance-field',
                'oninput' => "this.parentNode.previousElementSibling.querySelector('output').textContent = this.value"
            ],
        ])
        ->add('acidite', RangeType::class, [
            'label' => 'Acidité',
            'attr' => [
                'min' => 1,
                'max' => 10,
                'value' => 1,
                'class' => 'horizontal-range acidite',
                'id' => 'acidite-field',
                'oninput' => "this.parentNode.previousElementSibling.querySelector('output').textContent = this.value"
            ],
        ])
        ->add('ressentiAlcool', RangeType::class, [
            'label' => 'Ressenti d\'alcool',
            'attr' => [
                'min' => 1,
                'max' => 10,
                'value' => 1,
                'class' => 'horizontal-range ressentiAlcool',
                'id' => 'ressentiAlcool-field',
                'oninput' => "this.parentNode.previousElementSibling.querySelector('output').textContent = this.value"
            ],
        ])
        ->add('douceur', RangeType::class, [
            'label' => 'Douceur',
            'attr' => [
                'min' => 1,
                'max' => 10,
                'value' => 1,
                'class' => 'horizontal-range douceur',
                'id' => 'douceur-field',
                'oninput' => "this.parentNode.previousElementSibling.querySelector('output').textContent = this.value"
            ],
        ])
        ->add('intensite', RangeType::class, [
            'label' => 'Intensité',
            'attr' => [
                'min' => 1,
                'max' => 10,
                'value' => 1,
                'class' => 'horizontal-range intensite',
                'id' => 'intensite-field',
                'oninput' => "this.parentNode.previousElementSibling.querySelector('output').textContent = this.value"
            ],
        ])

        ->add('fluidite', ChoiceType::class, [
            'choices' => [
                'Visqueuse' => 'visqueuse',
                'Grasse' => 'grasse',
                'Épaisse' => 'epaisse',
                'Coulante' => 'coulante',
                'Fluide' => 'fluide',
            ],
            'required' => true,
            'expanded' => true,
        ])

            ->add('arome', ChoiceType::class, [
                'choices' => [
                    'Floral' => [
                        'Chèvrefeuille' => 'Chèvrefeuille',
                        'Fleur d\'oranger' => 'Fleur d\'oranger',
                        'Violette' => 'Violette',
                        'Rose' => 'Rose',
                        'Acacia' => 'Acacia',
                        'Tilleul' => 'Tilleul',
                        'Jasmin' => 'Jasmin',
                        'Camomille' => 'Camomille',
                        'Foin' => 'Foin',
                        'Herbe Coupée' => 'Herbe',
                    ],
                    'Fruité' => [
                        'Pêche-abricot' => 'Pêche-abricot',
                        'Cerise' => 'Cerise',
                        'Prune' => 'Prune',
                        'Olive verte' => 'Olive verte',
                        'Framboise' => 'Framboise',
                        'Mûre' => 'Mûre',
                        'Fraise' => 'Fraise',
                        'Cassis' => 'Cassis',
                        'Poire' => 'Poire',
                        'Pomme' => 'Pomme',
                    ],

                    'Animal' => [
                        'Musc' => 'Musc',
                        'Cuir' => 'Cuir',
                        'Fourrure' => 'Fourrure',
                    ],

                    'Végétal' => [
                        'Foin' => 'Foin',
                        'Herbe coupée' => 'Herbe coupée',
                        'Thym' => 'Thym',
                        'Humus' => 'Humus',
                        'Champignon' => 'Champignon',
                        'Terre' => 'Terre',
                        'Ecorce' => 'Ecorce',
                        'Résine' => 'Résine',
                        'Santal' => 'Santal',
                        'Chêne' => 'Chêne',
                    ],


                    'Épicé' => [
                        'Canelle' => 'Canelle',
                        'Poivre' => 'Poivre',
                        'Curry' => 'Curry',
                        'Safran' => 'Safran',
                    ],

                    'Marin' => [
                        'Algue' => 'Algue',
                        'Iode' => 'Iode',
                    ],

                ],
                'required' => true,
                'multiple' => true,
                'expanded' => true,

            ])

            ->add('structure', ChoiceType::class, [
                'choices' => [
                    'Légère' => 'legere',
                    'Fluide' => 'fluide',
                    'Charpentée' => 'charpente',
                ],
                'required' => true,
                'expanded' => true,
                'choice_attr' => function ($choice) {
                    return ['class' => 'matiere-button'];
                }
            ])
            ->add('matiere', ChoiceType::class, [
                'choices' => [
                    'Massive' => 'massive',
                    'Étoffée' => 'etoffee',
                    'Légère' => 'legere',
                    'Fluette' => 'fluette',
                ],
                'required' => true,
                'expanded' => true,
            ])

            ->add('emotion', ChoiceType::class, [
                'choices' => [
                    'Joie' => 'joie',
                    'Satisfaction' => 'satisfaction',
                    'Étonnement' => 'etonnement',
                    'Ennui' => 'ennui',
                    'Dégout' => 'degout',
                ],
                'required' => true,
                'expanded' => true,
                'attr' => [
                    'class' => 'matiere-button'
                ]
            ])

            ->add('note', ChoiceType::class, [
                'choices' => [
                    '0/10' => 0,
                    '1/10' => 1,
                    '2/10' => 2,
                    '3/10' => 3,
                    '4/10' => 4,
                    '5/10' => 5,
                    '6/10' => 6,
                    '7/10' => 7,
                    '8/10' => 8,
                    '9/10' => 9,
                    '10/10' => 10,
                ],
                'required' => true,
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheDegustation::class,
        ]);
    }
}
