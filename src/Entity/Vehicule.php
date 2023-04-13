<?php

namespace App\Entity;
use App\Repository\VehiculeRepository;
use App\Entity\Categorie;
use Symfony\Component\Validator\Constraints as Assert;




use Doctrine\ORM\Mapping as ORM;



 #[ORM\Entity(repositoryClass: VehiculeRepository::class)]

class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idVehicule = null ;
   

    
    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Remplir vos champs")]
    #[Assert\Regex(
        pattern: '/^([0-9]+TUN[0-9]+)$/',
        message: "Le nom du livreur doit contenir des caractères alphabétiques uniquement."
    )]
    private ?string $matricule = null ;

    
    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Remplir vos champs")]
    #[Assert\Length(min: 2)]
    private ?string $marque = null ;

    #[ORM\ManyToOne(targetEntity: Categorie::class)]
    #[ORM\JoinColumn(name: "id_categorie", referencedColumnName: "id_categorie")]
    protected $idCategorie;

    public function getIdVehicule(): ?int
    {
        return $this->idVehicule;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getIdCategorie(): ?Categorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?Categorie $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }


}
