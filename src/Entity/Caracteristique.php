<?php

namespace App\Entity;

use App\Repository\CaracteristiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaracteristiqueRepository::class)]
class Caracteristique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $fruite = null;

    #[ORM\Column]
    private ?int $puissance = null;

    #[ORM\Column]
    private ?int $souplesse = null;

    #[ORM\Column]
    private ?int $boise = null;

    #[ORM\Column]
    private ?int $mineralite = null;

    #[ORM\Column]
    private ?int $moelleux = null;

    #[ORM\Column]
    private ?int $floral = null;

    #[ORM\Column]
    private ?int $epice = null;

    #[ORM\Column]
    private ?int $couleur = null;

    #[ORM\ManyToOne(inversedBy: 'caracteristiques')]
    private ?Vin $vin = null;

    #[ORM\ManyToOne(inversedBy: 'caracteristiques')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFruite(): ?int
    {
        return $this->fruite;
    }

    public function setFruite(int $fruite): self
    {
        $this->fruite = $fruite;

        return $this;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getSouplesse(): ?int
    {
        return $this->souplesse;
    }

    public function setSouplesse(int $souplesse): self
    {
        $this->souplesse = $souplesse;

        return $this;
    }

    public function getBoise(): ?int
    {
        return $this->boise;
    }

    public function setBoise(int $boise): self
    {
        $this->boise = $boise;

        return $this;
    }

    public function getMineralite(): ?int
    {
        return $this->mineralite;
    }

    public function setMineralite(int $mineralite): self
    {
        $this->mineralite = $mineralite;

        return $this;
    }

    public function getMoelleux(): ?int
    {
        return $this->moelleux;
    }

    public function setMoelleux(int $moelleux): self
    {
        $this->moelleux = $moelleux;

        return $this;
    }

    public function getFloral(): ?int
    {
        return $this->floral;
    }

    public function setFloral(int $floral): self
    {
        $this->floral = $floral;

        return $this;
    }

    public function getEpice(): ?int
    {
        return $this->epice;
    }

    public function setEpice(int $epice): self
    {
        $this->epice = $epice;

        return $this;
    }

    public function getCouleur(): ?int
    {
        return $this->couleur;
    }

    public function setCouleur(int $couleur): self
    {
        $this->couleur = $couleur;

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
}
