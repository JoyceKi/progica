<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiteRepository::class)]
class Gite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $surfaceHab = null;

    #[ORM\Column]
    private ?int $chambre = null;

    #[ORM\Column]
    private ?int $couchage = null;

    #[ORM\Column]
    private ?bool $animauxacceptes = null;

    #[ORM\Column(nullable: true)]
    private ?float $tarifAnimaux = null;

    #[ORM\ManyToOne(inversedBy: 'gites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Proprietaire $proprietaire = null;

    #[ORM\OneToOne(inversedBy: 'gite', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;

    #[ORM\ManyToMany(targetEntity: TarifGite::class, inversedBy: 'gites')]
    private Collection $tarifGite;

    #[ORM\ManyToMany(targetEntity: Equipement::class, inversedBy: 'gites')]
    private Collection $equipement;

    #[ORM\ManyToMany(targetEntity: Service::class, inversedBy: 'gites')]
    private Collection $service;

    public function __construct()
    {
        $this->tarifGite = new ArrayCollection();
        $this->equipement = new ArrayCollection();
        $this->service = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSurfaceHab(): ?int
    {
        return $this->surfaceHab;
    }

    public function setSurfaceHab(int $surfaceHab): static
    {
        $this->surfaceHab = $surfaceHab;

        return $this;
    }

    public function getChambre(): ?int
    {
        return $this->chambre;
    }

    public function setChambre(int $chambre): static
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getCouchage(): ?int
    {
        return $this->couchage;
    }

    public function setCouchage(int $couchage): static
    {
        $this->couchage = $couchage;

        return $this;
    }

    public function isAnimauxacceptes(): ?bool
    {
        return $this->animauxacceptes;
    }

    public function setAnimauxacceptes(bool $animauxacceptes): static
    {
        $this->animauxacceptes = $animauxacceptes;

        return $this;
    }

    public function getTarifAnimaux(): ?float
    {
        return $this->tarifAnimaux;
    }

    public function setTarifAnimaux(?float $tarifAnimaux): static
    {
        $this->tarifAnimaux = $tarifAnimaux;

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): static
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(Adresse $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, TarifGite>
     */
    public function getTarifGite(): Collection
    {
        return $this->tarifGite;
    }

    public function addTarifGite(TarifGite $tarifGite): static
    {
        if (!$this->tarifGite->contains($tarifGite)) {
            $this->tarifGite->add($tarifGite);
        }

        return $this;
    }

    public function removeTarifGite(TarifGite $tarifGite): static
    {
        $this->tarifGite->removeElement($tarifGite);

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipement(): Collection
    {
        return $this->equipement;
    }

    public function addEquipement(Equipement $equipement): static
    {
        if (!$this->equipement->contains($equipement)) {
            $this->equipement->add($equipement);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): static
    {
        $this->equipement->removeElement($equipement);

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addService(Service $service): static
    {
        if (!$this->service->contains($service)) {
            $this->service->add($service);
        }

        return $this;
    }

    public function removeService(Service $service): static
    {
        $this->service->removeElement($service);

        return $this;
    }
}
