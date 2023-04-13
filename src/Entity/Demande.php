<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="demande_ibfk_3", columns={"IdPersonne"}), @ORM\Index(name="IdColis", columns={"IdColis"}), @ORM\Index(name="IdOffre", columns={"IdOffre"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdDemande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddemande;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionDemande", type="string", length=255, nullable=false)
     */
    private $descriptiondemande;

    /**
     * @var int
     *
     * @ORM\Column(name="IdPersonne", type="integer", nullable=false, options={"default"="1"})
     */
    private $idpersonne = 1;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdOffre", referencedColumnName="IdOffre")
     * })
     */
    private $idoffre;

    /**
     * @var \Colis
     *
     * @ORM\ManyToOne(targetEntity="Colis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdColis", referencedColumnName="id_colis")
     * })
     */
    private $idcolis;

    public function getIddemande(): ?int
    {
        return $this->iddemande;
    }

    public function getDescriptiondemande(): ?string
    {
        return $this->descriptiondemande;
    }

    public function setDescriptiondemande(string $descriptiondemande): self
    {
        $this->descriptiondemande = $descriptiondemande;

        return $this;
    }

    public function getIdpersonne(): ?int
    {
        return $this->idpersonne;
    }

    public function setIdpersonne(int $idpersonne): self
    {
        $this->idpersonne = $idpersonne;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdoffre(): ?Offre
    {
        return $this->idoffre;
    }

    public function setIdoffre(?Offre $idoffre): self
    {
        $this->idoffre = $idoffre;

        return $this;
    }

    public function getIdcolis(): ?Colis
    {
        return $this->idcolis;
    }

    public function setIdcolis(?Colis $idcolis): self
    {
        $this->idcolis = $idcolis;

        return $this;
    }


}
