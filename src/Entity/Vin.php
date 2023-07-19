<?php

namespace App\Entity;

use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\VinRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: VinRepository::class)]
#[UniqueEntity('nom', message: 'ce nom existe déjà')]
#[Vich\Uploadable]
class Vin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $nom;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description;

    #[ORM\Column(length: 255)]
    private ?string $region;

    #[ORM\Column]
    private ?int $millesime;

    #[ORM\Column]
    private ?float $degreAlcool;

    #[ORM\Column]
    private ?float $prix;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'poster_file', fileNameProperty: 'image')]
    #[Assert\File(maxSize: '1M', mimeTypes: ['image/jpeg', 'image/png', 'image/webp'])]
    private ?File $posterFile = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?Datetime $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'vin', targetEntity: FicheDegustation::class)]
    private Collection $ficheDegustations;

    #[ORM\OneToMany(mappedBy: 'vin', targetEntity: Cepage::class)]
    private Collection $cepages;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $couleur;

    #[ORM\Column(length: 255)]
    private ?string $limpidite;

    #[ORM\Column(length: 255)]
    private ?string $fluidite;

    #[ORM\Column]
    private int $brillance = 0;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $arome = [];

    #[ORM\Column]
    private ?int $intensite = 0;

    #[ORM\Column]
    private ?int $douceur = 0;

    #[ORM\Column]
    private ?int $alcool = 0;

    #[ORM\Column(length: 255)]
    private ?string $persistance;

    #[ORM\Column(length: 255)]
    private ?string $structure;

    #[ORM\Column(length: 255)]
    private ?string $matiere;

    #[ORM\ManyToMany(targetEntity: Atelier::class, mappedBy: 'vin')]
    private Collection $ateliers;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'vin')]
    private ?Profil $profil = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'watchlist')]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'vin', targetEntity: Note::class, cascade: ['remove'])]
    private Collection $notes;



    #[ORM\Column(nullable: true)]
    private ?bool $star = null;


    public function __construct()
    {
        $this->cepages = new ArrayCollection();
        $this->ateliers = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->notes = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getMillesime(): ?int
    {
        return $this->millesime;
    }

    public function setMillesime(int $millesime): self
    {
        $this->millesime = $millesime;

        return $this;
    }

    public function getDegreAlcool(): ?float
    {
        return $this->degreAlcool;
    }

    public function setDegreAlcool(float $degreAlcool): self
    {
        $this->degreAlcool = $degreAlcool;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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

    public function addFicheDegustation(FicheDegustation $ficheDegustation): self
    {
        if (!$this->ficheDegustations->contains($ficheDegustation)) {
            $this->ficheDegustations->add($ficheDegustation);
            $ficheDegustation->setVin($this);
        }

        return $this;
    }

    public function removeFicheDegustation(FicheDegustation $ficheDegustation): self
    {
        if ($this->ficheDegustations->removeElement($ficheDegustation)) {
            // set the owning side to null (unless already changed)
            if ($ficheDegustation->getVin() === $this) {
                $ficheDegustation->setVin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cepage>
     */
    public function getCepages(): Collection
    {
        return $this->cepages;
    }

    public function addCepage(Cepage $cepage): self
    {
        if (!$this->cepages->contains($cepage)) {
            $this->cepages->add($cepage);
            $cepage->setVin($this);
        }

        return $this;
    }

    public function removeCepage(Cepage $cepage): self
    {
        if ($this->cepages->removeElement($cepage)) {
            // set the owning side to null (unless already changed)
            if ($cepage->getVin() === $this) {
                $cepage->setVin(null);
            }
        }

        return $this;
    }

    public function setPosterFile(File $poster = null): Vin
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

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;
        return $this;
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

    public function getFluidite(): ?string
    {
        return $this->fluidite;
    }

    public function setFluidite(string $fluidite): self
    {
        $this->fluidite = $fluidite;
        return $this;
    }

    public function getBrillance(): ?int
    {
        return $this->brillance;
    }

    public function setBrillance(int $brillance): self
    {
        $this->brillance = $brillance;
        return $this;
    }

    public function getArome(): array
    {
        return $this->arome;
    }

    public function setArome(?array $arome): self
    {
        $this->arome = $arome;
        return $this;
    }

    public function getIntensite(): ?int
    {
        return $this->intensite;
    }

    public function setIntensite(int $intensite): self
    {
        $this->intensite = $intensite;
        return $this;
    }

    public function getDouceur(): ?int
    {
        return $this->douceur;
    }

    public function setDouceur(int $douceur): self
    {
        $this->douceur = $douceur;
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

    public function getPersistance(): ?string
    {
        return $this->persistance;
    }

    public function setPersistance(string $persistance): self
    {
        $this->persistance = $persistance;
        return $this;
    }

    public function getStructure(): ?string
    {
        return $this->structure;
    }

    public function setStructure(string $structure): self
    {
        $this->structure = $structure;
        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(string $matiere): self
    {
        $this->matiere = $matiere;
        return $this;
    }

    public function getAteliers(): Collection
    {
        return $this->ateliers;
    }

    public function addAtelier(Atelier $atelier): self
    {
        if (!$this->ateliers->contains($atelier)) {
            $this->ateliers->add($atelier);
            $atelier->addVin($this); // Update the inverse side of the relationship
        }

        return $this;
    }

    public function removeAtelier(Atelier $atelier): self
    {
        if ($this->ateliers->removeElement($atelier)) {
            $atelier->removeVin($this); // Update the inverse side of the relationship
        }

        return $this;
    }

    public function getEmoji(): string
    {
        if ($this->couleur === 'rouge') {
            return ' 🍷';
        } else {
            return ' 🥂';
        }
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

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addWatchlist($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeWatchlist($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): static
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setVin($this);
        }

        return $this;
    }

    public function removeNote(Note $note): static
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getVin() === $this) {
                $note->setVin(null);
            }
        }

        return $this;
    }

    public function isStar(): ?bool
    {
        return $this->star;
    }

    public function setStar(?bool $star): static
    {
        $this->star = $star;

        return $this;
    }
}
