<?php

namespace App\Entity;

use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AnimationsRepository;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: AnimationsRepository::class)]
#[Vich\Uploadable]
class Animations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column(length: 2000)]
    private ?string $resume = null;

    #[ORM\Column(length: 2000)]
    private ?string $description = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;


    #[Vich\UploadableField(mapping: 'poster_file', fileNameProperty: 'image')]
    #[Assert\File(maxSize: '1M', mimeTypes: ['image/jpeg', 'image/png', 'image/webp'])]
    private ?File $posterFile = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?Datetime $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'animations', targetEntity: Atelier::class)]
    private Collection $ateliers;

    public function __construct()
    {
        $this->ateliers = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }


    public function setPosterFile(File $poster = null): Animations
    {
        $this->posterFile = $poster;
        if ($poster) {
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    public function getPosterFile(): ?File
    {
        return $this->posterFile;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }


    public function setSlug(string $slug): ?string
    {
        $this->slug = $slug;

        return $this->slug;
    }

    /**
     * @return Collection<int, Atelier>
     */
    public function getAteliers(): Collection
    {
        return $this->ateliers;
    }

    public function addAtelier(Atelier $atelier): static
    {
        if (!$this->ateliers->contains($atelier)) {
            $this->ateliers->add($atelier);
            $atelier->setAnimations($this);
        }

        return $this;
    }

    public function removeAtelier(Atelier $atelier): static
    {
        if ($this->ateliers->removeElement($atelier)) {
            // set the owning side to null (unless already changed)
            if ($atelier->getAnimations() === $this) {
                $atelier->setAnimations(null);
            }
        }

        return $this;
    }
}
