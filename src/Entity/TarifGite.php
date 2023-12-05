<?php

namespace App\Entity;

use App\Repository\TarifGiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifGiteRepository::class)]
class TarifGite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $tarifHebdo = null;

    #[ORM\ManyToMany(targetEntity: Gite::class, mappedBy: 'tarifGite')]
    private Collection $gites;

    #[ORM\ManyToMany(targetEntity: Periode::class, mappedBy: 'tarifGite')]
    private Collection $periodes;

    public function __construct()
    {
        $this->gites = new ArrayCollection();
        $this->periodes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifHebdo(): ?float
    {
        return $this->tarifHebdo;
    }

    public function setTarifHebdo(float $tarifHebdo): static
    {
        $this->tarifHebdo = $tarifHebdo;

        return $this;
    }

    /**
     * @return Collection<int, Gite>
     */
    public function getGites(): Collection
    {
        return $this->gites;
    }

    public function addGite(Gite $gite): static
    {
        if (!$this->gites->contains($gite)) {
            $this->gites->add($gite);
            $gite->addTarifGite($this);
        }

        return $this;
    }

    public function removeGite(Gite $gite): static
    {
        if ($this->gites->removeElement($gite)) {
            $gite->removeTarifGite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Periode>
     */
    public function getPeriodes(): Collection
    {
        return $this->periodes;
    }

    public function addPeriode(Periode $periode): static
    {
        if (!$this->periodes->contains($periode)) {
            $this->periodes->add($periode);
            $periode->addTarifGite($this);
        }

        return $this;
    }

    public function removePeriode(Periode $periode): static
    {
        if ($this->periodes->removeElement($periode)) {
            $periode->removeTarifGite($this);
        }

        return $this;
    }
}
