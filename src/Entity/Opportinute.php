<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Affectationopcolis;
use App\Repository\OpportinuteRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Date;



#[ORM\Entity(repositoryClass: OpportinuteRepository::class)]

 
class Opportinute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_opp = null ;
   

    #[ORM\Column(type: "date")]
    #[Assert\NotBlank(message: "Tu dois saisir la date d'opportunite")]
    #[Assert\GreaterThanOrEqual("today", message: "La date doit être postérieure ou égale à aujourd'hui")]
    private ?\DateTimeInterface $date = null;
    
   
    

    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Tu dois saisir le depart")]
    private ?string $depart = null ;
    

    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Tu dois saisir l'heur depart")]
    #[Assert\Regex(
        pattern: "/^(0[0-9]|1[0-9]|2[0-3])\.([0-5][0-9])$/",
        message: "The hour format should be HH.MM"
    )]
    private ?float $heurDepart = null ;
    

    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Tu dois saisir l'arrivee'")]
    private ?string $arrivee = null ;
   

    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Tu dois saisir l'heur arrivee")]
   
    #[Assert\Regex(
        pattern: "/^(0[0-9]|1[0-9]|2[0-3])\.([0-5][0-9])$/",
        message: "The hour format should be HH.MM"
    )]
    private ?float $heurArrivee = null ;
 

    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Tu dois saisir la Description d'opportunite")]
    private ?string $description = null ;


    #[ORM\OneToOne(targetEntity: Affectationopcolis::class, mappedBy: 'id_opp')]
    private $Affectationopcolis;

   
    

    
    

 

    public function getIdOpp(): ?int
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

  


    public function getAffectationopcolis(): ?Affectationopcolis
    {
        return $this->Affectationopcolis;
    }
    

    public function setAffectationopcolis(?Affectationopcolis $Affectationopcolis): self
    {
        // unset the owning side of the relation if necessary
        if ($Affectationopcolis === null && $this->Affectationopcolis !== null) {
            $this->Affectationopcolis->setIdOpp(null);
        }

        // set the owning side of the relation if necessary
        if ($Affectationopcolis !== null && $Affectationopcolis->getIdOpp() !== $this) {
            $Affectationopcolis->setIdOpp($this);
        }

        $this->Affectationopcolis = $Affectationopcolis;

        return $this;
    }


}
