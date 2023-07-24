<?php

namespace App\Form;

use App\Repository\VinRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SearchVinType extends AbstractType
{
    private Vinrepository $vinRepository;

    public function __construct(VinRepository $vinRepository)
    {
        $this->vinRepository = $vinRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', SearchType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Gewurztraminer',
                ],
                'required' => false,
            ])
            ->add('date', IntegerType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Année',
                ],
                'required' => false,
            ])
            ->add('couleur', ChoiceType::class, [
                'label' => false,
                'choices' => $this->vinRepository->getCouleurChoices(), // récupère les couleurs
                'placeholder' => '-- Couleur --',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
