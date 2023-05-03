<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Opportinute
 *
 * @ORM\Table(name="opportinute")
 * @ORM\Entity
 */
class Opportinute
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_opp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOpp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="depart", type="string", length=50, nullable=false)
     */
    private $depart;

    /**
     * @var float
     *
     * @ORM\Column(name="heur_depart", type="float", precision=10, scale=0, nullable=false)
     */
    private $heurDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="arrivee", type="string", length=255, nullable=false)
     */
    private $arrivee;

    /**
     * @var float
     *
     * @ORM\Column(name="heur_arrivee", type="float", precision=10, scale=0, nullable=false)
     */
    private $heurArrivee;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    public function getIdOpp(): ?int
    {
        return $this->idOpp;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDepart(): ?string
    {
        return $this->depart;
    }

    public function setDepart(string $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    public function getHeurDepart(): ?float
    {
        return $this->heurDepart;
    }

    public function setHeurDepart(float $heurDepart): self
    {
        $this->heurDepart = $heurDepart;

        return $this;
    }

    public function getArrivee(): ?string
    {
        return $this->arrivee;
    }

    public function setArrivee(string $arrivee): self
    {
        $this->arrivee = $arrivee;

        return $this;
    }

    public function getHeurArrivee(): ?float
    {
        return $this->heurArrivee;
    }

    public function setHeurArrivee(float $heurArrivee): self
    {
        $this->heurArrivee = $heurArrivee;

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


}
