<?php

namespace App\Entity;

use App\Repository\CepageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CepageRepository::class)]
class Cepage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'cepages')]
    private ?Vin $vin = null;

    #[ORM\ManyToOne]
    private ?Caracteristique $caracteristiques = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getCaracteristiques(): ?Caracteristique
    {
        return $this->caracteristiques;
    }

    public function setCaracteristiques(?Caracteristique $caracteristiques): self
    {
        $this->caracteristiques = $caracteristiques;

        return $this;
    }
}
