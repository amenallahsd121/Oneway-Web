<?php

namespace App\Entity;
use App\Entity\Colis;
use Doctrine\ORM\Mapping as ORM;


 
 #[ORM\Entity(repositoryClass: LivraisonRepository::class)]

class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idLivraison = null ;
   

    #[ORM\Column(length:50)]
    private ?string $etat = null ;
   
    // #[ORM\ManyToOne(inversedBy: 'Colis')]
    // private ?int $idColis = null ;


    // #[ORM\ManyToOne(inversedBy: 'Livreur')]
    // private ?int $idLivreur = null ;
    

    public function getIdLivraison(): ?int
    {
        return $this->idLivraison;
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

    // public function getIdColis(): ?Colis
    // {
    //     return $this->idColis;
    // }

    // public function setIdColis(?Colis $idColis): self
    // {
    //     $this->idColis = $idColis;

    //     return $this;
    // }

    // public function getIdLivreur(): ?Livreur
    // {
    //     return $this->idLivreur;
    // }

    // public function setIdLivreur(?Livreur $idLivreur): self
    // {
    //     $this->idLivreur = $idLivreur;

    //     return $this;
    // }


}
