<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class StrongPasswordValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$this->isStrongPassword($value)) {
            $this->context->buildViolation($constraint->message) /* @phpstan-ignore-line */
                ->addViolation();
        }
    }

    private function isStrongPassword(mixed $password): bool
    {
        // Vérification de la présence d'au moins une lettre majuscule, une lettre minuscule et un chiffre
        if (
            $hasUppercase = preg_match('/[A-Z]/', $password) && $hasLowercase = preg_match('/[a-z]/', $password)
            && $hasDigit = preg_match('/[0-9]/', $password)
        ) {
            return true;
        } else {
            return false;
        }
    }
}
