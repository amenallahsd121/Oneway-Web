<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\CategorieoffreRepository;

#[ORM\Entity(repositoryClass: CategorieoffreRepository::class)]
#[ORM\Table(name: "Categorieoffre")]
#[ORM\Index(name: "typeoffre", columns: ["typeoffre"])]

class Categorieoffre
{
    
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int  $idcatoffre  = null;

#[ORM\Column]
private ?float $poidsoffre = null;
   

    #[ORM\Column]

private ?int $nbrecolisoffre = null;

#[ORM\Column(name:"typeoffre",unique:true)]  
private ?string  $typeoffre = null;

    public function getIdcatoffre(): ?int
    {
        return $this->idcatoffre ;
    }

    public function getPoidsoffre(): ?float
    {
        return $this->poidsoffre;
    }

    public function setPoidsoffre(float $poidsoffre): self
    {
        $this->poidsoffre = $poidsoffre;

        return $this;
    }

    public function getNbrecolisoffre(): ?int
    {
        return $this->nbrecolisoffre;
    }

    public function setNbrecolisoffre(int $nbrecolisoffre): self
    {
        $this->nbrecolisoffre = $nbrecolisoffre;

        return $this;
    }

    public function getTypeoffre(): ?string
    {
        return $this->typeoffre;
    }

    public function setTypeoffre(string $typeoffre): self
    {
        $this->typeoffre = $typeoffre;

        return $this;
    }

    public function __toString()
    {
        return $this->getTypeoffre(); // Return the title of the task as the string representation
    }
}