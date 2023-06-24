<?php

namespace App\Controller\Form;

use Symfony\Component\Validator\Constraints as Assert;

class ContactForm
{
    #[Assert\NotBlank(message: "Le champ Nom est requis")]
    private $name;

    #[Assert\NotBlank(message: "Le champ e-mail est requis")]
    #[Assert\Email(message: "L'adresse email n'est pas valide")]
    private $email;

    #[Assert\NotBlank(message: 'Le champ message est requis')]
    private $content;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'content' => $this->getContent(),
        ];
    }
}
