<?php

namespace App\Entity;
use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OffreRepository;
use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: OffreRepository::class)]



class Offre
{
    #[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]

private ?int $idoffre = null;

   

#[ORM\Column]

private ?int $idcatcolis = null;
    

   #[ORM\Column(length: 225) ]
private ?string  $descriptionoffre = null;


#[ORM\Column(length: 158) ]
private ?string  $maxretard = null;
  

#[ORM\Column]
private ?float $prixoffre = null;


#[ORM\Column]
private ?DateTime $dateoffre = null;

   

#[ORM\Column]
private ?DateTime $datesortieoffre = null;


#[ORM\Column(length: 255)]
private ?string $etat= null;


#[ORM\Column]

private ?int $nbredemande = null;

#[ORM\ManyToOne (targetEntity:'App\Entity\Categorieoffre')]
#[ORM\JoinColumn(name:"CatOffreId", referencedColumnName:"idcatoffre")]
private ?Categorieoffre $catoffreid = null;

#[ORM\ManyToOne (targetEntity:'App\Entity\Trajetoffre')]
#[ORM\JoinColumn(name:"IdTrajetOffre", referencedColumnName:"idtrajetoffre")]
private ?Trajetoffre $idtrajetoffre = null;


#[ORM\ManyToOne (targetEntity:'App\Entity\Utilisateur')]
#[ORM\JoinColumn(name: "iduser",referencedColumnName:"id")]
private ?Utilisateur $iduser = null;
    

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

    public function getCatoffreid(): ?Categorieoffre
    {
        return $this->catoffreid;
    }

    public function setCatoffreid( ?Categorieoffre $catoffreid): self
    {
        $this->catoffreid = $catoffreid;

        return $this;
    }

    public function getIdtrajetoffre(): ?Trajetoffre
    {
        return $this->idtrajetoffre;
    }
    public function setIdtrajetoffre(?TrajetOffre $idtrajetoffre ): self
    {
        $this->idtrajetoffre 
        = $idtrajetoffre ;

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

    public function getDateoffre(): ?DateTime
    {
        return $this->dateoffre;
    }

    public function setDateoffre(?DateTime $dateoffre): self
    {
        $this->dateoffre = $dateoffre;

        return $this;
    }

    public function getDatesortieoffre(): ?DateTime
    {
        return $this->datesortieoffre;
    }

    public function setDatesortieoffre(?DateTime $datesortieoffre): self
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

    public function getIduser(): ?Utilisateur
    {
        return $this->iduser;
    }

 
    public function setIduser(?Utilisateur $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }
  

}