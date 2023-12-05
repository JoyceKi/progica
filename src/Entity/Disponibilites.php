<?php

namespace App\Entity;

use App\Repository\DisponibilitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisponibilitesRepository::class)]
class Disponibilites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jours = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\ManyToMany(targetEntity: Proprietaire::class, mappedBy: 'disponibilites')]
    private Collection $proprietaires;

    public function __construct()
    {
        $this->proprietaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJours(): ?string
    {
        return $this->jours;
    }

    public function setJours(string $jours): static
    {
        $this->jours = $jours;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): static
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): static
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * @return Collection<int, Proprietaire>
     */
    public function getProprietaires(): Collection
    {
        return $this->proprietaires;
    }

    public function addProprietaire(Proprietaire $proprietaire): static
    {
        if (!$this->proprietaires->contains($proprietaire)) {
            $this->proprietaires->add($proprietaire);
            $proprietaire->addDisponibilite($this);
        }

        return $this;
    }

    public function removeProprietaire(Proprietaire $proprietaire): static
    {
        if ($this->proprietaires->removeElement($proprietaire)) {
            $proprietaire->removeDisponibilite($this);
        }

        return $this;
    }
}
