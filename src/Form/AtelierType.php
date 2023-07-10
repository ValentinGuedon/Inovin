<?php

namespace App\Form;

use App\Entity\Vin;
use App\Entity\User;
use App\Entity\Cepage;
use App\Entity\Atelier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AtelierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('place')
            ->add('date')
            ->add('horaire')
            ->add('address')
            ->add('commentaire')
            ->add('vin', null, ['choice_label' => function (Vin $vin) {
                return $vin->getNom() . ' ' . $vin->getEmoji();
            },
                'multiple' => true,
                'autocomplete' => true,
                'attr' => [
                    'class' => 'autocomplete-select'
                ],
            ])
            ->add('users', null, [
                'choice_label' => function (User $user) {
                    return $user->getName() . ' 🧑';
                },
                'multiple' => true,
                'autocomplete' => true,
                'attr' => [
                    'class' => 'autocomplete-select'
                ],
            ])

            ->add('cepage', null, [
                'choice_label' => function (Cepage $cepage) {
                    return $cepage->getType();
                },
                'multiple' => true,
                'autocomplete' => true,
                'attr' => [
                    'class' => 'autocomplete-select'
                ],
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Atelier::class,
        ]);
    }
}
