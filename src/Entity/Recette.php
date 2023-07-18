<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'recettes')]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'recettes1')]
    private ?Cepage $cepage1 = null;

    #[ORM\ManyToOne(inversedBy: 'recettes2')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cepage $cepage2 = null;

    #[ORM\ManyToOne(inversedBy: 'recettes3')]
    private ?Cepage $cepage3 = null;

    #[ORM\ManyToOne(inversedBy: 'recettes4')]
    private ?Cepage $cepage4 = null;

    #[ORM\Column]
    private ?int $quantite1 = null;

    #[ORM\Column]
    private ?int $quantite2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantite3 = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantite4 = null;


    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(nullable: true)]
    private ?bool $winner = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getQuantite1(): ?int
    {
        return $this->quantite1;
    }

    public function setQuantite1(int $quantite1): self
    {
        $this->quantite1 = $quantite1;

        return $this;
    }

    public function getCepage1(): ?Cepage
    {
        return $this->cepage1;
    }

    public function setCepage1(?Cepage $cepage1): self
    {
        $this->cepage1 = $cepage1;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getQuantite2(): ?int
    {
        return $this->quantite2;
    }

    public function setQuantite2(int $quantite2): static
    {
        $this->quantite2 = $quantite2;

        return $this;
    }

    public function getCepage3(): ?Cepage
    {
        return $this->cepage3;
    }

    public function setCepage3(?Cepage $cepage3): static
    {
        $this->cepage3 = $cepage3;

        return $this;
    }

    public function getQuantite3(): ?int
    {
        return $this->quantite3;
    }

    public function setQuantite3(?int $quantite3): static
    {
        $this->quantite3 = $quantite3;

        return $this;
    }

    public function getCepage4(): ?Cepage
    {
        return $this->cepage4;
    }

    public function setCepage4(?Cepage $cepage4): static
    {
        $this->cepage4 = $cepage4;

        return $this;
    }

    public function getQuantite4(): ?int
    {
        return $this->quantite4;
    }

    public function setQuantite4(?int $quantite4): static
    {
        $this->quantite4 = $quantite4;

        return $this;
    }

    public function getCepage2(): ?Cepage
    {
        return $this->cepage2;
    }

    public function setCepage2(?Cepage $cepage2): static
    {
        $this->cepage2 = $cepage2;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function isWinner(): ?bool
    {
        return $this->winner;
    }

    public function setWinner(?bool $winner): static
    {
        $this->winner = $winner;


        return $this;
    }
}
