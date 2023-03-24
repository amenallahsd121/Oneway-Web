<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut_event", type="string", length=20, nullable=false)
     */
    private $dateDebutEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin_event", type="string", length=20, nullable=false)
     */
    private $dateFinEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="awards", type="string", length=255, nullable=false)
     */
    private $awards;

    public function getIdEvent(): ?int
    {
        return $this->idEvent;
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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebutEvent(): ?string
    {
        return $this->dateDebutEvent;
    }

    public function setDateDebutEvent(string $dateDebutEvent): self
    {
        $this->dateDebutEvent = $dateDebutEvent;

        return $this;
    }

    public function getDateFinEvent(): ?string
    {
        return $this->dateFinEvent;
    }

    public function setDateFinEvent(string $dateFinEvent): self
    {
        $this->dateFinEvent = $dateFinEvent;

        return $this;
    }

    public function getAwards(): ?string
    {
        return $this->awards;
    }

    public function setAwards(string $awards): self
    {
        $this->awards = $awards;

        return $this;
    }


}
