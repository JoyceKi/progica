<?php
namespace App\Model;

class RechercheGite 
{
    private $region;

    private $departement;

    private $ville;
    private $equipements;
    private $services;
    private $animauxacceptes;

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(?string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEquipements(): ?string
    {
        return $this->equipements;
    }

    public function setEquipements(?string $equipements): self
    {
        $this->equipements = $equipements;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

    public function setServices(?string $services): self
    {
        $this->services = $services;

        return $this;
    }

    public function getAnimauxacceptes(): ?bool
    {
        return $this->animauxacceptes;
    }

    public function setAnimauxacceptes(?bool $animauxacceptes): self
    {
        $this->animauxacceptes = $animauxacceptes;

        return $this;
    }
    
}