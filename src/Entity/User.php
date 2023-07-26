<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Entity\FicheDegustation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\Criteria;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $street = null;

    #[ORM\Column]
    private ?int $postalcode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: FicheDegustation::class)]
    private Collection $ficheDegustations;


    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Recette::class)]
    private Collection $recettes;

    #[ORM\ManyToMany(targetEntity: Atelier::class, mappedBy: 'users')]
    private Collection $atelier;


    #[ORM\Column(nullable: true)]
    private ?bool $participant = null;

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?Profil $profil = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\ManyToMany(targetEntity: Vin::class, inversedBy: 'users')]
    #[ORM\JoinTable(name:'watchlist')]
    private Collection $watchlist;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Note::class, cascade:['persist'])]
    private Collection $notes;

    #[ORM\Column(length: 255)]
    private ?string $wineType = null;

    #[ORM\Column(length: 255)]
    private ?string $wineColor = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $arome = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $retex = null;

    public function __construct()
    {
        $this->ficheDegustations = new ArrayCollection();
        $this->recettes = new ArrayCollection();
        $this->atelier = new ArrayCollection();
        $this->watchlist = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPostalcode(): ?int
    {
        return $this->postalcode;
    }

    public function setPostalcode(int $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
    public function getFavoriteFicheDegustation(): ?FicheDegustation
    {
        $criteria = Criteria::create()
            ->orderBy(['note' => Criteria::DESC])
            ->setMaxResults(1);

        return $this->ficheDegustations->matching($criteria)->first() ?: null;
    }

    public function getLastFicheDegustation(): ?FicheDegustation
    {
        $criteria = Criteria::create()
            ->orderBy(['id' => Criteria::DESC])
            ->setMaxResults(1);

        return $this->ficheDegustations->matching($criteria)->first() ?: null;
    }

    public function getFicheDegustationsFromDate(\DateTimeInterface $date): Collection
    {
        $criteria = Criteria::create()
        ->where(Criteria::expr()->eq('date', $date))
        ->orderBy(['id' => Criteria::DESC]);

        return $this->ficheDegustations->matching($criteria);
    }
    /**
     * @return Collection<int, FicheDegustation>
     */


    public function getFicheDegustations(): Collection
    {
        return $this->ficheDegustations;
    }

    public function addFicheDegustation(FicheDegustation $ficheDegustation): self
    {
        if (!$this->ficheDegustations->contains($ficheDegustation)) {
            $this->ficheDegustations->add($ficheDegustation);
            $ficheDegustation->setUser($this);
        }

        return $this;
    }

    public function removeFicheDegustation(FicheDegustation $ficheDegustation): self
    {
        if ($this->ficheDegustations->removeElement($ficheDegustation)) {
            // set the owning side to null (unless already changed)
            if ($ficheDegustation->getUser() === $this) {
                $ficheDegustation->setUser(null);
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
            $recette->setUser($this);
        }

        return $this;
    }

    public function removeRecette(Recette $recette): self
    {
        if ($this->recettes->removeElement($recette)) {
            // set the owning side to null (unless already changed)
            if ($recette->getUser() === $this) {
                $recette->setUser(null);
            }
        }

        return $this;
    }

    public function getAtelier(): Collection
    {
        return $this->atelier;
    }

    public function setAtelier(Collection $atelier): self
    {
        $this->atelier = $atelier;

        return $this;
    }

    public function isParticipant(): ?bool
    {
        return $this->participant;
    }

    public function setParticipant(?bool $participant): self
    {
        $this->participant = $participant;

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
     * @return Collection<int, Vin>
     */
    public function getWatchlist(): Collection
    {
        return $this->watchlist;
    }

    public function addWatchlist(Vin $watchlist): static
    {
        if (!$this->watchlist->contains($watchlist)) {
            $this->watchlist->add($watchlist);
        }

        return $this;
    }

    public function removeWatchlist(Vin $watchlist): static
    {
        $this->watchlist->removeElement($watchlist);

        return $this;
    }

    public function isInWatchlist(Vin $vin): bool
    {
        return $this->watchlist->contains($vin);
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
            $note->setUser($this);
        }

        return $this;
    }

    public function updateNote(Note $note): static
    {
        foreach ($this->notes as $existingNote) {
            if ($existingNote->getVin() === $note->getVin()) {
                $existingNote->setNote($note->getNote());
            }
        }
        return $this;
    }

    public function alreadyNote(Vin $vin): bool
    {
        foreach ($this->notes as $note) {
            if ($note->getVin() === $vin) {
                return true;
            }
        }
        return false;
    }

    public function getWineType(): ?string
    {
        return $this->wineType;
    }

    public function setWineType(string $wineType): self
    {
        $this->wineType = $wineType;

        return $this;
    }


    public function getWineColor(): ?string
    {
        return $this->wineColor;
    }


    public function setWineColor(string $wineColor): self
    {
        $this->wineColor = $wineColor;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getRetex(): ?string
    {
        return $this->retex;
    }

    public function setRetex(?string $retex): static
    {
        $this->retex = $retex;
        return $this;
    }
}
