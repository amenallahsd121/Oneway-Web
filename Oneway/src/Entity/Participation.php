<?php

namespace App\Entity;

use App\Entity\Evenement;
use App\Entity\Utilisateur;
use App\Repository\ParticipationRepository;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity(repositoryClass: ParticipationRepository::class)]


class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idParticipation= null;

    #[ORM\ManyToOne(targetEntity: Evenement::class)]
    #[ORM\JoinColumn(name: "id_event", referencedColumnName: "id_event")]
    protected $id_event;
   

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
#[ORM\JoinColumn(name: "id_user", referencedColumnName: "id")]
protected $id_user;
    

    public function getIdParticipation(): ?int
    {
        return $this->idParticipation;
    }

    public function getid_Event(): ?Evenement
    {
        return $this->id_event;
    }

    public function setid_Event(?Evenement $id_event): self
    {
        $this->id_event = $id_event;

        return $this;
    }

    public function getId_user(): ?Utilisateur
    {
        return $this->id_user;
    }

    public function setId_user(?Utilisateur $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdEvent(): ?Evenement
    {
        return $this->id_event;
    }

    public function setIdEvent(?Evenement $id_event): self
    {
        $this->id_event = $id_event;

        return $this;
    }

    public function getIdUser(): ?Utilisateur
    {
        return $this->id_user;
    }

    public function setIdUser(?Utilisateur $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }


}
