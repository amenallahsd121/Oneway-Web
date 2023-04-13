<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectationopcolis
 *
 * @ORM\Table(name="affectationopcolis", uniqueConstraints={@ORM\UniqueConstraint(name="UK_colis", columns={"id_colis"})}, indexes={@ORM\Index(name="fk_affOpp", columns={"id_opp"})})
 * @ORM\Entity
 */
class Affectationopcolis
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_aff", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAff;

    /**
     * @var \Opportinute
     *
     * @ORM\ManyToOne(targetEntity="Opportinute")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_opp", referencedColumnName="id_opp")
     * })
     */
    private $idOpp;

    /**
     * @var \Colis
     *
     * @ORM\ManyToOne(targetEntity="Colis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_colis", referencedColumnName="id_colis")
     * })
     */
    private $idColis;

    public function getIdAff(): ?int
    {
        return $this->idAff;
    }

    public function getIdOpp(): ?Opportinute
    {
        return $this->idOpp;
    }

    public function setIdOpp(?Opportinute $idOpp): self
    {
        $this->idOpp = $idOpp;

        return $this;
    }

    public function getIdColis(): ?Colis
    {
        return $this->idColis;
    }

    public function setIdColis(?Colis $idColis): self
    {
        $this->idColis = $idColis;

        return $this;
    }


}
