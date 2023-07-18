<?php

namespace App\Form;

use DateTime;
use App\Entity\User;
use App\Validator\StrongPassword;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
                    new StrongPassword(),
                ],
            ])
            ->add('name', TextType::class, [])
            ->add('firstname', TextType::class, [])
            ->add('street', TextType::class, [])
            ->add('postalcode', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                ],
            ])
            ->add('city', TextType::class, [])
            ->add('birthdate', DateType::class, [
                'data' => new DateTime(),
                'years' => range(date('Y') - 50, date('Y')),
                'constraints' => [
                    new Callback([$this, 'validateAge']),
                ],
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
            ->add('content', TextareaType::class, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    public function validateAge(\DateTime $value, ExecutionContextInterface $context): void
    {
        $now = new \DateTime();
        $age = $now->diff($value)->y;

        if ($age < 18) {
            $context
                ->buildViolation('Vous devez avoir au moins 18 ans pour vous inscrire.')
                ->addViolation();
        }
    }
}
