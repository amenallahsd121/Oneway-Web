<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maintenance
 *
 * @ORM\Table(name="maintenance", indexes={@ORM\Index(name="FK_maintenanceVehi", columns={"id_vehicule"})})
 * @ORM\Entity
 */
class Maintenance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_maintenance", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMaintenance;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_sos_rep", type="string", length=255, nullable=false)
     */
    private $nomSosRep;

    /**
     * @var \Vehicule
     *
     * @ORM\ManyToOne(targetEntity="Vehicule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_vehicule", referencedColumnName="id_vehicule")
     * })
     */
    private $idVehicule;

    public function getIdMaintenance(): ?int
    {
        return $this->idMaintenance;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getNomSosRep(): ?string
    {
        return $this->nomSosRep;
    }

    public function setNomSosRep(string $nomSosRep): self
    {
        $this->nomSosRep = $nomSosRep;

        return $this;
    }

    public function getIdVehicule(): ?Vehicule
    {
        return $this->idVehicule;
    }

    public function setIdVehicule(?Vehicule $idVehicule): self
    {
        $this->idVehicule = $idVehicule;

        return $this;
    }


}
