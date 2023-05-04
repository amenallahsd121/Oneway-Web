<?php

namespace App\Entity;

use DateTime;
use App\Entity\Colis;
use App\Entity\Opportinute;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AffectationopcolisRepository;

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

    public function getRelation(): ?Opportinute
    {
        return $this->id_opp;
    }

    public function setRelation(?Opportinute $relation): self
    {
        $this->id_opp = $relation;

        return $this;
    }

    public function getJoinColis(): ?Colis
    {
        return $this->id_colis;
    }


    public function setJoinColis(?Colis $joinColis): self
    {
        $this->id_colis = $joinColis;

        return $this;
    }

    public function getIdOpp(): ?Opportinute
    {
        return $this->id_opp;
    }
    public function getid_Opp(): ?Opportinute
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
    public function getid_colis(): ?Colis
    {
        return $this->id_colis;
    }

    public function setIdColis(?Colis $id_colis): self
    {
        $this->id_colis = $id_colis;

        return $this;
    }





    public function __toString()
    {


        return (string)  'Vous avez Affecter votre colis de type ' . $this->id_colis->getTypeColis() . '  à  une Opportinute de depart   ' . $this->id_opp->getDepart() . ' à ' . $this->id_opp->getHeurDepart() . 'et s arrive à ' . $this->id_opp->getArrivee() . '  à  ' . $this->id_opp->getHeurArrivee();
    }
}
