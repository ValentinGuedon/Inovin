<?php

namespace App\Form;

use Symfony\Component\Validator\Constraints as Assert;

class ContactForm
{
    #[Assert\NotBlank(message: "Le champ Nom est requis")]
    private ?string $name;

    #[Assert\NotBlank(message: "Le champ e-mail est requis")]
    #[Assert\Email(message: "L'adresse email n'est pas valide")]
    private ?string $email;

    #[Assert\NotBlank(message: 'Le champ message est requis')]
    private ?string $content;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
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
