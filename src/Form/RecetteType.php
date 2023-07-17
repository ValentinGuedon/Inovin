<?php

namespace App\Form;

use DateTime;
use App\Entity\Vin;
use App\Entity\User;
use App\Entity\Cepage;
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
            ->add('quantite1', IntegerType::class, [
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

            ->add('cepage1', EntityType::class, [
                'class' => Cepage::class,
                'query_builder' => function (EntityRepository $er) {
                    $date = new DateTime();
                    $formatDate = $date->format('Y-m-d');
                    return $er->createQueryBuilder('c')
                        ->join('c.ateliers', 'atelier')
                        ->where('atelier.date = :date')
                        ->setParameter('date', $formatDate)
                        ->orderBy('c.type', 'ASC');
                },
                'choice_label' => 'type',
            ])
            ->add('cepage2', EntityType::class, [
                'class' => Cepage::class,
                'query_builder' => function (EntityRepository $er) {
                    $date = new DateTime();
                    $formatDate = $date->format('Y-m-d');
                    return $er->createQueryBuilder('c')
                        ->join('c.ateliers', 'atelier')
                        ->where('atelier.date = :date')
                        ->setParameter('date', $formatDate)
                        ->orderBy('c.type', 'ASC');
                },
                'choice_label' => 'type',
            ])
            ->add('cepage3', null, [
                'class' => Cepage::class,
                'query_builder' => function (EntityRepository $er) {
                    $date = new DateTime();
                    $formatDate = $date->format('Y-m-d');
                    return $er->createQueryBuilder('c')
                        ->join('c.ateliers', 'atelier')
                        ->where('atelier.date = :date')
                        ->setParameter('date', $formatDate)
                        ->orderBy('c.type', 'ASC');
                },
                'choice_label' => 'type',
            ])
            ->add('cepage4', null, [
                'class' => Cepage::class,
                'query_builder' => function (EntityRepository $er) {
                    $date = new DateTime();
                    $formatDate = $date->format('Y-m-d');
                    return $er->createQueryBuilder('c')
                        ->join('c.ateliers', 'atelier')
                        ->where('atelier.date = :date')
                        ->setParameter('date', $formatDate)
                        ->orderBy('c.type', 'ASC');
                },
                'choice_label' => 'type',
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
