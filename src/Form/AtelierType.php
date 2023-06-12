<?php

namespace App\Form;

use App\Entity\Atelier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\User;
use App\Entity\Vin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AtelierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('place')
            ->add('date')
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
                    return $user->getName() . '🧑';
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
