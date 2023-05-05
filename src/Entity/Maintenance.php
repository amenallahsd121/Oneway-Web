<?php

namespace App\Entity;
use App\Repository\MaintenanceRepository;
use App\Entity\Vehicule;
use Symfony\Component\Validator\Constraints as Assert;


use Doctrine\ORM\Mapping as ORM;


 

 #[ORM\Entity(repositoryClass: MaintenanceRepository::class)]
 
class Maintenance
{
   

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idMaintenance = null ;
   
    

    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Remplir vos champs")]
    #[Assert\Length(max: 10)]
    private ?string $etat = null ;
    

    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Remplir vos champs")]
    #[Assert\Length(min: 5)]
    private ?string $nomSosRep = null ;
    
   
    #[ORM\ManyToOne(targetEntity: Vehicule::class)]
    #[ORM\JoinColumn(name: "id_vehicule", referencedColumnName: "id_vehicule")]
    protected $idVehicule;
    



    
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
