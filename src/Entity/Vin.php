<?php

namespace App\Entity;

use App\Repository\VinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VinRepository::class)]
class Vin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column]
    private ?int $millesime = null;

    #[ORM\Column]
    private ?float $degreAlcool = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'vin')]
    private ?FicheDegustation $ficheDegustation = null;

    #[ORM\OneToMany(mappedBy: 'vin', targetEntity: Favoris::class)]
    private Collection $favoris;

    #[ORM\OneToMany(mappedBy: 'vin', targetEntity: Recette::class)]
    private Collection $recettes;

    #[ORM\OneToMany(mappedBy: 'vin', targetEntity: Caracteristique::class)]
    private Collection $caracteristiques;

    #[ORM\OneToMany(mappedBy: 'vin', targetEntity: Cepage::class)]
    private Collection $cepages;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $couleur = null;
    #[ORM\Column(length: 255)]
    private ?string $limpidite = null;
    #[ORM\Column(length: 255)]
    private ?string $fluidite = null;
    #[ORM\Column(length: 255)]
    private ?string $brillance = null;
    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $arome = [];
    #[ORM\Column]
    private ?int $intensite = null;
    #[ORM\Column]
    private ?int $douceur = null;
    #[ORM\Column]
    private ?int $alcool = null;
    #[ORM\Column(length: 255)]
    private ?string $persistance = null;
    #[ORM\Column(length: 255)]
    private ?string $structure = null;
    #[ORM\Column(length: 255)]
    private ?string $matiere = null;

    public function __construct()
    {
        $this->favoris = new ArrayCollection();
        $this->recettes = new ArrayCollection();
        $this->caracteristiques = new ArrayCollection();
        $this->cepages = new ArrayCollection();
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

    public function getFicheDegustation(): ?FicheDegustation
    {
        return $this->ficheDegustation;
    }

    public function setFicheDegustation(?FicheDegustation $ficheDegustation): self
    {
        $this->ficheDegustation = $ficheDegustation;

        return $this;
    }

    /**
     * @return Collection<int, Favoris>
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(Favoris $favori): self
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris->add($favori);
            $favori->setVin($this);
        }

        return $this;
    }

    public function removeFavori(Favoris $favori): self
    {
        if ($this->favoris->removeElement($favori)) {
            // set the owning side to null (unless already changed)
            if ($favori->getVin() === $this) {
                $favori->setVin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Recette>
     */
    public function getRecettes(): Collection
    {
        return $this->recettes;
    }

    public function addRecette(Recette $recette): self
    {
        if (!$this->recettes->contains($recette)) {
            $this->recettes->add($recette);
            $recette->setVin($this);
        }

        return $this;
    }

    public function removeRecette(Recette $recette): self
    {
        if ($this->recettes->removeElement($recette)) {
            // set the owning side to null (unless already changed)
            if ($recette->getVin() === $this) {
                $recette->setVin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Caracteristique>
     */
    public function getCaracteristiques(): Collection
    {
        return $this->caracteristiques;
    }

    public function addCaracteristique(Caracteristique $caracteristique): self
    {
        if (!$this->caracteristiques->contains($caracteristique)) {
            $this->caracteristiques->add($caracteristique);
            $caracteristique->setVin($this);
        }

        return $this;
    }

    public function removeCaracteristique(Caracteristique $caracteristique): self
    {
        if ($this->caracteristiques->removeElement($caracteristique)) {
            // set the owning side to null (unless already changed)
            if ($caracteristique->getVin() === $this) {
                $caracteristique->setVin(null);
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

    public function getBrillance(): ?string
    {
        return $this->brillance;
    }

    public function setBrillance(string $brillance): self
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
}
