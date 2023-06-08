<?php

namespace App\Entity;

use App\Repository\FicheDegustationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheDegustationRepository::class)]
class FicheDegustation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $limpidite = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    #[ORM\Column(length: 255)]
    private ?string $arome = null;

    #[ORM\Column(length: 255)]
    private ?string $tanins = null;

    #[ORM\Column]
    private ?int $alcool = null;

    #[ORM\Column]
    private ?int $equilibre = null;

    #[ORM\Column]
    private ?int $corps = null;

    #[ORM\Column]
    private ?int $finDebouche = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\ManyToOne(targetEntity: Vin::class, inversedBy: 'ficheDegustations')]
    private ?Vin $vin = null;

    #[ORM\ManyToOne(inversedBy: 'ficheDegustations')]
    private ?User $user = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLimpidite(): ?int
    {
        return $this->limpidite;
    }

    public function setLimpidite(int $limpidite): self
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

    public function getArome(): ?string
    {
        return $this->arome;
    }

    public function setArome(string $arome): self
    {
        $this->arome = $arome;

        return $this;
    }

    public function getTanins(): ?string
    {
        return $this->tanins;
    }

    public function setTanins(string $tanins): self
    {
        $this->tanins = $tanins;

        return $this;
    }

    public function getAlcool(): ?int
    {
        return $this->alcool;
    }

    public function setAlcool(int $alcool): self
    {
        $this->alcool = $alcool;

        return $this;
    }

    public function getEquilibre(): ?int
    {
        return $this->equilibre;
    }

    public function setEquilibre(int $equilibre): self
    {
        $this->equilibre = $equilibre;

        return $this;
    }

    public function getCorps(): ?int
    {
        return $this->corps;
    }

    public function setCorps(int $corps): self
    {
        $this->corps = $corps;

        return $this;
    }

    public function getFinDebouche(): ?int
    {
        return $this->finDebouche;
    }

    public function setFinDebouche(int $finDebouche): self
    {
        $this->finDebouche = $finDebouche;

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

    /**
     * @return Collection<int, Vin>
     */
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
