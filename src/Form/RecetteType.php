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

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('quantite')
            ->add('quantite2')
            ->add('quantite3')
            ->add('quantite4')
            ->add('vin1', EntityType::class, [
                'class' => Vin::class,
                'query_builder' => function (EntityRepository $er) use ($options) {
                    return $er->createQueryBuilder('v')
                    ->join('v.ateliers', 'atelier')
                    ->where("atelier=:id")
                    ->setParameter('id', $options['idAtelier'])
                    ->orderBy('v.nom', 'DESC');
                },
                'choice_label' => 'nom',
            ])
            ->add('vin2', null, [
                'choice_label' => 'nom',
                'class' => Vin::class,
                'query_builder' => function (EntityRepository $er) use ($options) {
                    return $er->createQueryBuilder('v')
                    ->join('v.ateliers', 'atelier')
                    ->where("atelier=:id")
                    ->setParameter('id', $options['idAtelier'])
                    ->orderBy('v.nom', 'DESC');
                },
            ])
            ->add('vin3', null, [
                'choice_label' => 'nom',
                'class' => Vin::class,
                'query_builder' => function (EntityRepository $er) use ($options) {
                    return $er->createQueryBuilder('v')
                    ->join('v.ateliers', 'atelier')
                    ->where("atelier=:id")
                    ->setParameter('id', $options['idAtelier'])
                    ->orderBy('v.nom', 'DESC');
                },
            ])
            ->add('vin4', null, [
                'choice_label' => 'nom',
                'class' => Vin::class,
                'query_builder' => function (EntityRepository $er) use ($options) {
                    return $er->createQueryBuilder('v')
                    ->join('v.ateliers', 'atelier')
                    ->where("atelier=:id")
                    ->setParameter('id', $options['idAtelier'])
                    ->orderBy('v.nom', 'DESC');
                },
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
