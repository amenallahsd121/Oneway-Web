<?php

namespace App\Entity;
use App\Repository\EvenementRepository;
use App\Entity\Participation;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;







#[ORM\Entity(repositoryClass: EvenementRepository::class)]



class Evenement
{
  
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_event = null ;


    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Tu dois saisir le nom")]
    private ?string $nom = null ;

    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Tu dois saisir la description")]  
    private ?string $description = null ;
   

    #[ORM\Column(type: "date")]
    #[Assert\NotBlank(message: "Tu dois saisir la date debut de l'event")]
    #[Assert\GreaterThanOrEqual("today", message: "La date doit être postérieure ou égale à aujourd'hui")]
    private ?\DateTimeInterface $dateDebutEvent = null;
 


    #[ORM\Column(type: "date")]
    #[Assert\NotBlank(message: "Tu dois saisir la date de fin")]
    #[Assert\GreaterThanOrEqual(propertyPath: "dateDebutEvent", message: "La date doit être postérieure ou égale à la date debut de l'event")]
    private ?\DateTimeInterface $dateFinEvent = null;




    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Tu dois saisir Awards")]
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

    public function setParticipation(?Participation $Participation): self
    {
        // unset the owning side of the relation if necessary
        if ($Participation === null && $this->Participation !== null) {
            $this->Participation->setIdEvent(null);
        }

        // set the owning side of the relation if necessary
        if ($Participation !== null && $Participation->getIdEvent() !== $this) {
            $Participation->setIdEvent($this);
        }

        $this->Participation = $Participation;

        return $this;
    }

    public function getDateDebutEvent(): ?\DateTimeInterface
    {
        return $this->dateDebutEvent;
    }

    public function setDateDebutEvent(\DateTimeInterface $dateDebutEvent): void
    {
        $this->dateDebutEvent = $dateDebutEvent;

        
    }

    public function getDateFinEvent(): ?\DateTimeInterface
    {
        return $this->dateFinEvent;
    }

    public function setDateFinEvent(\DateTimeInterface $dateFinEvent): void
    {
        $this->dateFinEvent = $dateFinEvent;

       
    }

}
