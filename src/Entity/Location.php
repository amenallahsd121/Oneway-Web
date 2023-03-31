<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?float $Xaxe = null;

    #[ORM\Column]
    private ?float $Yaxe = null;

    #[ORM\ManyToOne(inversedBy: 'locations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?relais $id_relai = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getXaxe(): ?float
    {
        return $this->Xaxe;
    }

    public function setXaxe(float $Xaxe): self
    {
        $this->Xaxe = $Xaxe;

        return $this;
    }

    public function getYaxe(): ?float
    {
        return $this->Yaxe;
    }

    public function setYaxe(float $Yaxe): self
    {
        $this->Yaxe = $Yaxe;

        return $this;
    }

    public function getIdRelai(): ?relais
    {
        return $this->id_relai;
    }

    public function setIdRelai(?relais $id_relai): self
    {
        $this->id_relai = $id_relai;

        return $this;
    }
}
