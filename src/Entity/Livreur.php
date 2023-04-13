<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivreurRepository;
use App\Entity\Utilisateur;
use ORM\Table;

 
#[ORM\Entity(repositoryClass: LivreurRepository::class)]

class Livreur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_livreur = null ;
    

    #[ORM\Column(length:50)]
    private ?string $cinLivreur = null ;
   

    #[ORM\Column(length:50)]
    private ?string $nom = null ;
    


    #[ORM\Column(length:50)]
    private ?string $prenom = null ;
   
    

    #[ORM\Column(length:50)]
    private ?string $vehicule = null ;


    public function getIdLivreur(): ?int
    {
        return $this->id_livreur;
    }

    public function getCinLivreur(): ?string
    {
        return $this->cinLivreur;
    }

    public function setCinLivreur(string $cinLivreur): self
    {
        $this->cinLivreur = $cinLivreur;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getVehicule(): ?string
    {
        return $this->vehicule;
    }

    public function setVehicule(string $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }


}
