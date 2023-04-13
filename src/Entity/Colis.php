<?php

namespace App\Entity;

use App\Repository\ColisRepository;
use App\Repository\LivraisonRepository;
use App\Entity\Utilisateur;
use App\Entity\Livraison;
use ORM\Table;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity(repositoryClass: ColisRepository::class)]

class Colis
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_colis = null ;


    #[ORM\Column]
    private ?float $poids = null ;


    #[ORM\Column]
    private ?float $prix = null ;

    #[ORM\Column(length:50)]
    private ?string $typeColis = null ;


    #[ORM\Column(length:50)]
    private ?string $lieuDepart = null ;

    #[ORM\Column(length:50)]
    private ?string $lieuArrive = null ;
   


#[ORM\ManyToOne(targetEntity: Utilisateur::class)]
#[ORM\JoinColumn(name: "id_client", referencedColumnName: "id")]
protected $id_client;




#[ORM\OneToOne(targetEntity: Livraison::class, mappedBy: 'colis')]
    private $livraisons;




    public function getIdColis(): ?int
    {
        return $this->id_colis;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTypeColis(): ?string
    {
        return $this->typeColis;
    }

    public function setTypeColis(string $typeColis): self
    {
        $this->typeColis = $typeColis;

        return $this;
    }

    public function getLieuDepart(): ?string
    {
        return $this->lieuDepart;
    }

    public function setLieuDepart(string $lieuDepart): self
    {
        $this->lieuDepart = $lieuDepart;

        return $this;
    }

    public function getLieuArrive(): ?string
    {
        return $this->lieuArrive;
    }

    public function setLieuArrive(string $lieuArrive): self
    {
        $this->lieuArrive = $lieuArrive;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->id_client;
    }

    public function setUtilisateur(?Utilisateur $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    public function getIdClient(): ?Utilisateur
    {
        return $this->id_client;
    }

    public function setIdClient(?Utilisateur $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    public function getLivraisons(): ?Livraison
    {
        return $this->livraisons;
    }

    public function setLivraisons(?Livraison $livraisons): self
    {
        // unset the owning side of the relation if necessary
        if ($livraisons === null && $this->livraisons !== null) {
            $this->livraisons->setColis(null);
        }

        // set the owning side of the relation if necessary
        if ($livraisons !== null && $livraisons->getColis() !== $this) {
            $livraisons->setColis($this);
        }

        $this->livraisons = $livraisons;

        return $this;
    }


}