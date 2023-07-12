<?php

namespace App\Form;

use DateTime;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // ->add('agreeTerms', CheckboxType::class, [
            //     'mapped' => false,
            //     'constraints' => [
            //         new IsTrue([
            //             'message' => 'You should agree to our terms.',
            //         ]),
            //     ],
            // ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'nouveau mot de passe',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit faire au moins {{ limit }} charactères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('name', TextType::class, [])
            ->add('firstname', TextType::class, [])
            ->add('street', TextType::class, [])
            ->add('postalcode', IntegerType::class, [])
            ->add('city', TextType::class, [])
            ->add('birthdate', DateType::class, [
                'data' => new DateTime(),
                'years' => range(date('Y') - 50, date('Y')),
            ])
            ->add('email', TextType::class, [])
            ->add('phone', TextType::class, [])
            ->add('wineColor', ChoiceType::class, [
                'choices' => [
                    'Blanc' => 'Blanc',
                    'Rouge' => 'Rouge',
                ],
                'required' => true,
                'expanded' => false,
            ])
            ->add('wineType', ChoiceType::class, [
                'choices' => [
                    'Sec' => 'Sec',
                    'Sucré' => 'Sucré',
                ],
                'required' => true,
                'expanded' => false,
            ])
            ->add('arome', ChoiceType::class, [
                'choices' => [
                    'Animal' => 'Animal',
                    'Epicé' => 'Epice',
                    'Floral' => 'Floral',
                    'Fruité' => 'Fruité',
                    'Marin' => 'Marin',
                    'Végétal' => 'Végétal',
                ],
                'required' => true,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('content', TextareaType::class, []);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
