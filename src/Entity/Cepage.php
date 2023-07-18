<?php

namespace App\Entity;

use App\Repository\CepageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Atelier::class, mappedBy: 'cepage')]
    private Collection $ateliers;

    #[ORM\OneToMany(mappedBy: 'cepage1', targetEntity: Recette::class)]
    private Collection $recettes1;

    #[ORM\OneToMany(mappedBy: 'cepage2', targetEntity: Recette::class)]
    private Collection $recettes2;

    #[ORM\OneToMany(mappedBy: 'cepage3', targetEntity: Recette::class)]
    private Collection $recettes3;

    #[ORM\OneToMany(mappedBy: 'cepage4', targetEntity: Recette::class)]
    private Collection $recettes4;

    public function __construct()
    {
        $this->ateliers = new ArrayCollection();
        $this->recettes1 = new ArrayCollection();
        $this->recettes2 = new ArrayCollection();
        $this->recettes3 = new ArrayCollection();
        $this->recettes4 = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->type;
    }

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


    /**
     * @return Collection<int, Atelier>
     */

    public function getAteliers(): Collection
    {
        return $this->ateliers;
    }

    /**
     * @return Collection<int, Recette>
     */
    public function getRecettes1(): Collection
    {
        return $this->recettes1;
    }

    /**
     * @return Collection<int, Recette>
     */
    public function getRecettes2(): Collection
    {
        return $this->recettes2;
    }

    /**
     * @return Collection<int, Recette>
     */
    public function getRecettes3(): Collection
    {
        return $this->recettes3;
    }

    /**
     * @return Collection<int, Recette>
     */
    public function getRecettes4(): Collection
    {
        return $this->recettes4;
    }

    public function addAtelier(Atelier $atelier): static
    {
        if (!$this->ateliers->contains($atelier)) {
            $this->ateliers->add($atelier);
            $atelier->addCepage($this);
        }

        return $this;
    }

    public function removeAtelier(Atelier $atelier): static
    {
        if ($this->ateliers->removeElement($atelier)) {
            $atelier->removeCepage($this);
        }

        return $this;
    }
}
