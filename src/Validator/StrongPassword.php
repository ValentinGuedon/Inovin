<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

class StrongPassword extends Constraint
{
    public string $message = 'Votre mot de passe doit contenir au moins une lettre majuscule, 
    une lettre minuscule, un chiffre et faire au moins 6 caractères';
}
