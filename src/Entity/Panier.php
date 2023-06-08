<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'panier', targetEntity: User::class, cascade: ['persist'])]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'panier', targetEntity: Vin::class)]
    private Collection $vin;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    private ?float $prix = null;

    public function __construct()
    {
        $this->vin = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Vin>
     */
    public function getVin(): Collection
    {
        return $this->vin;
    }

    public function addVin(Vin $vin): self
    {
        if (!$this->vin->contains($vin)) {
            $this->vin->add($vin);
            $vin->setPanier($this);
        }

        return $this;
    }

    public function removeVin(Vin $vin): self
    {
        if ($this->vin->removeElement($vin)) {
            // set the owning side to null (unless already changed)
            if ($vin->getPanier() === $this) {
                $vin->setPanier(null);
            }
        }

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
