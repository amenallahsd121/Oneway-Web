<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OffreRepository;

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


#[ORM\Column(length: 255)]
private ?string $dateoffre = null;

   

#[ORM\Column(length: 255)]
private ?string $datesortieoffre = null;


#[ORM\Column(length: 255)]
private ?string $etat= null;


#[ORM\Column]

private ?int $nbredemande = null;

#[ORM\ManyToOne (inversed8y: 'Offres')]
private ?Categorieoffre $catoffreid = null;


#[ORM\ManyToOne (inversed8y: 'Offres')]
private ?Trajetoffre $idtrajetoffre = null;

#[ORM\ManyToOne (inversed8y: 'Offres')]
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

    public function getCatoffreid(): ?string
    {
        return $this->catoffreid;
    }

    public function setCatoffreid(?CategorieOffre $catoffreid): self
    {
        $this->catoffreid = $catoffreid;

        return $this;
    }

    public function getIdtrajetoffre(): ?string
    {
        return $this->idtrajetoffre;
    }
    public function setIdtrajetoffre(?TrajetOffre $idtrajetoffre ): self
    {
        $this->$idtrajetoffre 
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

    public function setUtilisateur(?Utilisateur $iduser ): self
    {
        $this->$iduser 
        = $iduser ;

        return $this;
    }


}
