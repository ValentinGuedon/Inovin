<?php

namespace App\Form;

use App\Entity\FicheDegustation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheDegustationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('limpidite')
            ->add('couleur')
            ->add('arome')
            ->add('tanins')
            ->add('alcool')
            ->add('equilibre')
            ->add('corps')
            ->add('finDebouche')
            ->add('note')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheDegustation::class,
        ]);
    }
}
