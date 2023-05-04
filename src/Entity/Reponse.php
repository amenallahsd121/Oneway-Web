<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReponseRepository;
use App\Entity\Utilisateur;
use App\Entity\Reclamation;
use ORM\Table;
use Symfony\Component\Validator\Constraints as Assert;



#[ORM\Entity(repositoryClass: ReponseRepository::class)]


class Reponse
{
   
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_reponse = null;
    
  

    #[ORM\Column(length: 250)]
    #[Assert\NotBlank(message: "Tu dois saisir le texte de votre reponse")]
    #[Assert\Length(min: 3, minMessage: "Le texte de la réponse doit avoir au moins 3 caractères")]
    private ?string $text_rep = null;


    
    #[ORM\OneToOne(targetEntity: Reclamation::class, inversedBy: 'reponse')]
    #[ORM\JoinColumn(name: "id_reclamation", referencedColumnName: "id_reclamation")]
    protected $reclamation;


    

    public function getIdReponse(): ?int
    {
        return $this->id_reponse;
    }

    public function getId_Reponse(): ?int
    {
        return $this->id_reponse;
    }




    public function getText_Rep(): ?string
    {
        return $this->text_rep;
    }
    public function getTextRep(): ?string
    {
        return $this->text_rep;
    }


    public function setTextRep(string $text_rep): self
    {
        $this->text_rep = $text_rep;

        return $this;
    }
    public function setText_Rep(string $text_rep): self
    {
        $this->text_rep = $text_rep;

        return $this;
    }





    public function getReclamation(): ?Reclamation
    {
        return $this->reclamation;
    }

    public function setReclamation(?Reclamation $reclamation): self
    {
        $this->reclamation = $reclamation;

        return $this;
    }




     }