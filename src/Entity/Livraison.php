<?php

namespace App\Entity;
use App\Entity\Colis;
use App\Entity\Livreur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivraisonRepository;
use App\Repository\LivreurRepository;
use App\Repository\ColisRepository;


 
 #[ORM\Entity(repositoryClass: LivraisonRepository::class)]

class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idLivraison = null ;
   

    #[ORM\Column(length:50)]
    private ?string $etat = null ;
   

    #[ORM\OneToOne(targetEntity: Colis::class, inversedBy: 'livraisons')]
    #[ORM\JoinColumn(name: "id_colis", referencedColumnName: "id_colis")]
    protected $colis;

    


    #[ORM\ManyToOne(targetEntity: Livreur::class)]
    #[ORM\JoinColumn(name: "id_livreur", referencedColumnName: "id_livreur")]
    protected $livreur;
    
    

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

    public function getColis(): ?Colis
    {
        return $this->colis;
    }

    public function setColis(?Colis $colis): self
    {
        $this->colis = $colis;

        return $this;
    }


    public function getLivreur(): ?Livreur
    {
        return $this->livreur;
    }

    public function setLivreur(?Livreur $livreur): self
    {
        $this->livreur = $livreur;

        return $this;
    }


}
