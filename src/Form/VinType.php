<?php

namespace App\Form;

use App\Entity\Vin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('region')
            ->add('millesime')
            ->add('degreAlcool')
            ->add('prix')
            ->add('image')
            ->add('couleur')
            ->add('limpidite')
            ->add('fluidite')
            ->add('brillance')
            ->add('arome')
            ->add('intensite')
            ->add('douceur')
            ->add('alcool')
            ->add('persistance')
            ->add('structure')
            ->add('matiere')
            ->add('ficheDegustation')
            ->add('atelier')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vin::class,
        ]);
    }
}
