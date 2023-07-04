<?php

namespace App\Entity;

use App\Repository\FicheDegustationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheDegustationRepository::class)]
class FicheDegustation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $limpidite = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    #[ORM\Column(length: 255)]
    private ?array $arome = null;

    #[ORM\Column]
    private ?string $fluidite = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\ManyToOne(targetEntity: Vin::class, inversedBy: 'ficheDegustations')]
    private ?Vin $vin = null;

    #[ORM\ManyToOne(inversedBy: 'ficheDegustations')]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $persistance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $matiere = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $structure = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emotion = null;

    #[ORM\Column(nullable: true)]
    private ?int $brillance = null;

    #[ORM\Column(nullable: true)]
    private ?int $douceur = null;

    #[ORM\Column(nullable: true)]
    private ?int $acidite = null;

    #[ORM\Column(nullable: true)]
    private ?int $ressentiAlcool = null;

    #[ORM\Column(nullable: true)]
    private ?int $intensite = null;


    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLimpidite(): ?string
    {
        return $this->limpidite;
    }

    public function setLimpidite(string $limpidite): self
    {
        $this->limpidite = $limpidite;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getArome(): ?array
    {
        return $this->arome;
    }

    public function setArome(array $arome): self
    {
        $this->arome = $arome;

        return $this;
    }

    public function getfluidite(): ?string
    {
        return $this->fluidite;
    }

    public function setfluidite(string $fluidite): self
    {
        $this->fluidite = $fluidite;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }


    public function getVin(): ?Vin
    {
        return $this->vin;
    }

    public function setVin(?Vin $vin): self
    {
        $this->vin = $vin;

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

    public function getPersistance(): ?string
    {
        return $this->persistance;
    }

    public function setPersistance(?string $persistance): self
    {
        $this->persistance = $persistance;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(?string $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getStructure(): ?string
    {
        return $this->structure;
    }

    public function setStructure(?string $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getEmotion(): ?string
    {
        return $this->emotion;
    }

    public function setEmotion(?string $emotion): self
    {
        $this->emotion = $emotion;

        return $this;
    }

    public function getBrillance(): ?int
    {
        return $this->brillance;
    }

    public function setBrillance(?int $brillance): static
    {
        $this->brillance = $brillance;

        return $this;
    }

    public function getDouceur(): ?int
    {
        return $this->douceur;
    }

    public function setDouceur(?int $douceur): static
    {
        $this->douceur = $douceur;

        return $this;
    }

    public function getAcidite(): ?int
    {
        return $this->acidite;
    }

    public function setAcidite(?int $acidite): static
    {
        $this->acidite = $acidite;

        return $this;
    }

    public function getRessentiAlcool(): ?int
    {
        return $this->ressentiAlcool;
    }

    public function setRessentiAlcool(?int $ressentiAlcool): static
    {
        $this->ressentiAlcool = $ressentiAlcool;

        return $this;
    }

    public function getIntensite(): ?int
    {
        return $this->intensite;
    }

    public function setIntensite(?int $intensite): static
    {
        $this->intensite = $intensite;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }
}
