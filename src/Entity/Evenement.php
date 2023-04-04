<?php

namespace App\Entity;
use App\Repository\EvenementRepository;
use App\Entity\Participation;
use Doctrine\ORM\Mapping as ORM;








#[ORM\Entity(repositoryClass: EvenementRepository::class)]



class Evenement
{
  
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_event = null ;


    #[ORM\Column(length:50)]
    private ?string $nom = null ;

    #[ORM\Column(length:50)]
    private ?string $description = null ;
   

    #[ORM\Column(length:50)]
    private ?string $dateDebutEvent = null ;
 

    #[ORM\Column(length:50)]
    private ?string $dateFinEvent = null ;

    #[ORM\Column(length:50)]
    private ?string $awards = null ;
    
    #[ORM\OneToOne(targetEntity: Participation::class, mappedBy: 'id_event')]
    private $Participation;


    public function getId_Event(): ?int
    {
        return $this->id_event;
    }

    public function getIdEvent(): ?int
    {
        return $this->id_event;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getDateDebutEvent(): ?string
    {
        return $this->dateDebutEvent;
    }

    public function setDateDebutEvent(string $dateDebutEvent): self
    {
        $this->dateDebutEvent = $dateDebutEvent;

        return $this;
    }

    public function getDateFinEvent(): ?string
    {
        return $this->dateFinEvent;
    }

    public function setDateFinEvent(string $dateFinEvent): self
    {
        $this->dateFinEvent = $dateFinEvent;

        return $this;
    }

    public function getAwards(): ?string
    {
        return $this->awards;
    }

    public function setAwards(string $awards): self
    {
        $this->awards = $awards;

        return $this;
    }
    public function getParticipation(): ?Participation
    {
        return $this->Participation;
    }

}
