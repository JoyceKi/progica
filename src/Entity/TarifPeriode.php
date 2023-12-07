<?php

namespace App\Entity;

use App\Repository\TarifPeriodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifPeriodeRepository::class)]
class TarifPeriode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $dates = null;

    #[ORM\Column]
    private ?float $tarif = null;

    #[ORM\ManyToMany(targetEntity: Gite::class, inversedBy: 'tarifPeriodes')]
    private Collection $gite;

    public function __construct()
    {
        $this->gite = new ArrayCollection();
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

    public function getDates(): ?string
    {
        return $this->dates;
    }

    public function setDates(string $dates): static
    {
        $this->dates = $dates;

        return $this;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): static
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * @return Collection<int, Gite>
     */
    public function getGite(): Collection
    {
        return $this->gite;
    }

    public function addGite(Gite $gite): static
    {
        if (!$this->gite->contains($gite)) {
            $this->gite->add($gite);
        }

        return $this;
    }

    public function removeGite(Gite $gite): static
    {
        $this->gite->removeElement($gite);

        return $this;
    }
}
