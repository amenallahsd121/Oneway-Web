<?php

namespace App\Entity;


use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;





#[ORM\Entity(repositoryClass: CategorieRepository::class)]

class Categorie
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idCategorie = null ;
    

    #[ORM\Column(length:50)]
    #[Assert\NotBlank(message: "Remplir vos champs")]
    #[Assert\Length(min: 3)] 
    private ?string $type = null ;
    

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


}
