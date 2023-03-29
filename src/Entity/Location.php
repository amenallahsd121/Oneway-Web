<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location", indexes={@ORM\Index(name="id_relai", columns={"id_relai"})})
 * @ORM\Entity
 */
class Location
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=20, nullable=false)
     */
    private $adresse;

    /**
     * @var float
     *
     * @ORM\Column(name="Xaxe", type="float", precision=10, scale=0, nullable=false)
     */
    private $xaxe;

    /**
     * @var float
     *
     * @ORM\Column(name="Yaxe", type="float", precision=10, scale=0, nullable=false)
     */
    private $yaxe;

    /**
     * @var int
     *
     * @ORM\Column(name="id_relai", type="integer", nullable=false)
     */
    private $idRelai;

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
        return $this->xaxe;
    }

    public function setXaxe(float $xaxe): self
    {
        $this->xaxe = $xaxe;

        return $this;
    }

    public function getYaxe(): ?float
    {
        return $this->yaxe;
    }

    public function setYaxe(float $yaxe): self
    {
        $this->yaxe = $yaxe;

        return $this;
    }

    public function getIdRelai(): ?int
    {
        return $this->idRelai;
    }

    public function setIdRelai(int $idRelai): self
    {
        $this->idRelai = $idRelai;

        return $this;
    }


}
