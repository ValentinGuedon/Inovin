<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use DateTime;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

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
                'attr' => ['autocomplete' => 'new-password',
                'placeholder' => 'password'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('login', TextType::class, [
                'attr' => [
                    'placeholder' => 'login',
                ],
            ])
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'name',
                ],
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'placeholder' => 'firstname',
                ],
            ])
            ->add('street', TextType::class, [
                'attr' => [
                    'placeholder' => 'street',
                ],
            ])
            ->add('streetnumber', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'streetnumber',
                ],
            ])
            ->add('postalcode', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'postalcode',
                ],
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'placeholder' => 'city',
                ],
            ])
            ->add('birthdate', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'birthdate',
                ],
                'data' => new DateTime(),
            ])
            ->add('email', TextType::class, [
                'attr' => [
                    'placeholder' => 'email',
                ],
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'placeholder' => 'phone',
                ],
                // new Regex([
                //     'pattern' => '/^[0-9]{10}$/',
                //     'message' => 'Please enter a valid 10-digit phone number.',
                // ]),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
