<?php

namespace App\Form;

use App\Entity\Vin;
use App\Entity\User;
use App\Entity\Recette;
use App\Repository\VinRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('quantite', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 750,
                ],
                'required' => true,
            ])
            ->add('quantite2', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 750,
                ],
                'required' => true,
            ])
            ->add('quantite3', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 750,
                ],
                'required' => false,
            ])
            ->add('quantite4', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 750,
                ],
                'required' => false,
            ])


            ->add('vin1', EntityType::class, [
                'class' => Vin::class,
                // 'query_builder' => function (EntityRepository $er) use ($options) {
                //     return $er->createQueryBuilder('v')
                //     ->join('v.ateliers', 'atelier')
                //     ->where("atelier=:id")
                //     ->setParameter('id', $options['idAtelier'])
                //     ->orderBy('v.nom', 'DESC');
                // },
                'choice_label' => 'nom',
            ])
            ->add('vin2', EntityType::class, [
                'class' => Vin::class,
                'choice_label' => 'nom',
            ])
            ->add('vin3', null, [
                'choice_label' => 'nom',
            ])
            ->add('vin4', null, [
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
            'idAtelier' => '',
        ]);
    }
}
