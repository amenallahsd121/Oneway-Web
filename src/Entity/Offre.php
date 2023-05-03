<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="categorieOffre", columns={"CatOffreId"}), @ORM\Index(name="trajetOffre", columns={"IdTrajetOffre"})})
 * @ORM\Entity
 */
class Offre
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdOffre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idoffre;

    /**
     * @var int
     *
     * @ORM\Column(name="IdCatColis", type="integer", nullable=false)
     */
    private $idcatcolis;

    /**
     * @var string
     *
     * @ORM\Column(name="CatOffreId", type="string", length=255, nullable=false)
     */
    private $catoffreid;

    /**
     * @var string
     *
     * @ORM\Column(name="IdTrajetOffre", type="string", length=255, nullable=false)
     */
    private $idtrajetoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionOffre", type="string", length=255, nullable=false)
     */
    private $descriptionoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="MaxRetard", type="string", length=255, nullable=false)
     */
    private $maxretard;

    /**
     * @var float
     *
     * @ORM\Column(name="prixOffre", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixoffre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DateOffre", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $dateoffre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DateSortieOffre", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $datesortieoffre = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="nbreDemande", type="integer", nullable=false)
     */
    private $nbredemande;

    /**
     * @var int
     *
     * @ORM\Column(name="IdUser", type="integer", nullable=false)
     */
    private $iduser;

    public function getIdoffre(): ?int
    {
        return $this->idoffre;
    }

    public function getIdcatcolis(): ?int
    {
        return $this->idcatcolis;
    }

    public function setIdcatcolis(int $idcatcolis): self
    {
        $this->idcatcolis = $idcatcolis;

        return $this;
    }

    public function getCatoffreid(): ?string
    {
        return $this->catoffreid;
    }

    public function setCatoffreid(string $catoffreid): self
    {
        $this->catoffreid = $catoffreid;

        return $this;
    }

    public function getIdtrajetoffre(): ?string
    {
        return $this->idtrajetoffre;
    }

    public function setIdtrajetoffre(string $idtrajetoffre): self
    {
        $this->idtrajetoffre = $idtrajetoffre;

        return $this;
    }

    public function getDescriptionoffre(): ?string
    {
        return $this->descriptionoffre;
    }

    public function setDescriptionoffre(string $descriptionoffre): self
    {
        $this->descriptionoffre = $descriptionoffre;

        return $this;
    }

    public function getMaxretard(): ?string
    {
        return $this->maxretard;
    }

    public function setMaxretard(string $maxretard): self
    {
        $this->maxretard = $maxretard;

        return $this;
    }

    public function getPrixoffre(): ?float
    {
        return $this->prixoffre;
    }

    public function setPrixoffre(float $prixoffre): self
    {
        $this->prixoffre = $prixoffre;

        return $this;
    }

    public function getDateoffre(): ?string
    {
        return $this->dateoffre;
    }

    public function setDateoffre(?string $dateoffre): self
    {
        $this->dateoffre = $dateoffre;

        return $this;
    }

    public function getDatesortieoffre(): ?string
    {
        return $this->datesortieoffre;
    }

    public function setDatesortieoffre(?string $datesortieoffre): self
    {
        $this->datesortieoffre = $datesortieoffre;

        return $this;
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

    public function getNbredemande(): ?int
    {
        return $this->nbredemande;
    }

    public function setNbredemande(int $nbredemande): self
    {
        $this->nbredemande = $nbredemande;

        return $this;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(int $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }


}
