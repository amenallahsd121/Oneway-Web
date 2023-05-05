<?php

namespace App\Entity;

use App\Repository\AffectationopcolisRepository;
use App\Entity\Opportinute;
use App\Entity\Colis;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffectationopcolisRepository::class)]

class Affectationopcolis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_aff = null;



    #[ORM\OneToOne(targetEntity: Opportinute::class)]
    #[ORM\JoinColumn(name: "id_opp", referencedColumnName: "id_opp")]

    protected $id_opp;




    #[ORM\OneToOne(targetEntity: Colis::class, inversedBy: 'id_coliss')]
    #[ORM\JoinColumn(name: "id_colis", referencedColumnName: "id_colis")]
    protected $id_colis;









    public function getIdAff(): ?int
    {
        return $this->id_aff;
    }
    public function getid_aff(): ?int
    {
        return $this->id_aff;
    }

    public function getIdOpp(): ?Opportinute
    {
        return $this->id_opp;
    }

    public function setIdOpp(?Opportinute $id_opp): self
    {
        $this->id_opp = $id_opp;

        return $this;
    }

    public function getIdColis(): ?Colis
    {
        return $this->id_colis;
    }

    public function setIdColis(?Colis $id_colis): self
    {
        $this->id_colis = $id_colis;

        return $this;
    }




    
}
