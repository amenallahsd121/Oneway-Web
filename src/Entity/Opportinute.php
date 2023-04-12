<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OpportinuteRepository;
use Symfony\Component\Validator\Constraints\Date;



#[ORM\Entity(repositoryClass: OpportinuteRepository::class)]

 
class Opportinute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_opp = null ;
   

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $date = null;
    

    #[ORM\Column(length:50)]
    private ?string $depart = null ;
    

    #[ORM\Column(length:50)]
    private ?float $heurDepart = null ;
    

    #[ORM\Column(length:50)]
    private ?string $arrivee = null ;
   

    #[ORM\Column(length:50)]
    private ?float $heurArrivee = null ;
 

    #[ORM\Column(length:50)]
    private ?string $description = null ;


    

   
    

    public function getId_Opp(): ?int
    {
        return $this->id_opp;
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

    public function getDate(): ? \DateTimeInterface
    {
        return $this->date ;
    }

    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    // /**
    //  * @return Collection<int, Affectationopcolis>
    //  */
    // public function getAffectationopcolis(): Collection
    // {
    //     return $this->affectationopcolis;
    // }

    // public function addAffectationopcoli(Affectationopcolis $affectationopcoli): self
    // {
    //     if (!$this->affectationopcolis->contains($affectationopcoli)) {
    //         $this->affectationopcolis->add($affectationopcoli);
    //         $affectationopcoli->setRelation($this);
    //     }

    //     return $this;
    // }

    // public function removeAffectationopcoli(Affectationopcolis $affectationopcoli): self
    // {
    //     if ($this->affectationopcolis->removeElement($affectationopcoli)) {
    //         // set the owning side to null (unless already changed)
    //         if ($affectationopcoli->getRelation() === $this) {
    //             $affectationopcoli->setRelation(null);
    //         }
    //     }

    //     return $this;
    // }


}
