<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
class Atelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $place = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'atelier')]
    private Collection $users;

    #[ORM\ManyToMany(targetEntity: Vin::class, inversedBy: 'ateliers')]
    private Collection $vin;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = 'atelier';

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $horaire = null;

    #[ORM\ManyToOne(inversedBy: 'ateliers')]
    private ?Animations $animations = null;

    #[ORM\ManyToMany(targetEntity: Cepage::class, inversedBy: 'ateliers')]
    private Collection $cepage;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->vin = new ArrayCollection();
        $this->cepage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

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

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->getAtelier()->add($this); // Add the Atelier to the user's atelier collection
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            if ($user->getAtelier()->contains($this)) {
                $user->getAtelier()->removeElement($this);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Vin>
     */
    public function getvin(): Collection
    {
        return $this->vin;
    }

    public function addVin(Vin $vin): self
    {
        if (!$this->vin->contains($vin)) {
            $this->vin->add($vin);
            $vin->addAtelier($this); // Update the inverse side of the relationship
        }

        return $this;
    }

    public function removeVin(Vin $vin): self
    {
        if ($this->vin->removeElement($vin)) {
            $vin->removeAtelier($this); // Update the inverse side of the relationship
        }

        return $this;
    }
    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    public function setHoraire(?string $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getAnimations(): ?Animations
    {
        return $this->animations;
    }

    public function setAnimations(?Animations $animations): static
    {
        $this->animations = $animations;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Cepage>
     */
    public function getCepage(): Collection
    {
        return $this->cepage;
    }

    public function addCepage(Cepage $cepage): static
    {
        if (!$this->cepage->contains($cepage)) {
            $this->cepage->add($cepage);
        }

        return $this;
    }

    public function removeCepage(Cepage $cepage): static
    {
        $this->cepage->removeElement($cepage);

        return $this;
    }
}
