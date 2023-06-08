<?php

namespace App\Form;

use App\Entity\FicheDegustation;
use App\Entity\Vin;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheDegustationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('limpidite', null, [
                'required' => false,
                'empty_data' => null,
            ])
            ->add('couleur')
            ->add('arome')
            ->add('tanins')
            ->add('alcool')
            ->add('equilibre')
            ->add('corps')
            ->add('finDebouche')
            ->add('note')
            ->add('vin', EntityType::class, [
                'class' => 'App\Entity\Vin',
                'choice_label' => function (Vin $vin) {
                    return $vin->getNom() . ' ' . $vin->getEmoji();
                },
                'multiple' => true,
                'autocomplete' => true,
            ])
            ->add('user', EntityType::class, [
                'class' => 'App\Entity\User',
                'choice_label' => 'name',
                'multiple' => true,
                'autocomplete' => true,
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheDegustation::class,
        ]);
    }
}
