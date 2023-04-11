<?php

namespace App\Entity;
use App\Repository\AffectationopcolisRepository;
use App\Entity\Opportinute;
use App\Entity\Colis;
use Doctrine\ORM\Mapping as ORM;

 #[ORM\Entity(repositoryClass: Affectationopcolis::class)]
                                 
                                 class Affectationopcolis
                                 {
                                     #[ORM\Id]
                                     #[ORM\GeneratedValue]
                                     #[ORM\Column]
                                     private ?int $idAff = null ;
                              
                                     #[ORM\ManyToOne(inversedBy: 'affectationopcolis')]
                                     private ?Opportinute $relation = null;
                     
                                     #[ORM\ManyToOne(inversedBy: 'affectationopcolis')]
                                     private ?Colis $joinColis = null;
            
                                     public function getIdAff(): ?int
                                     {
                                         return $this->idAff;
                                     }
         
                                     public function getRelation(): ?Opportinute
                                     {
                                         return $this->relation;
                                     }
      
                                     public function setRelation(?Opportinute $relation): self
                                     {
                                         $this->relation = $relation;
      
                                         return $this;
                                     }
   
                                     public function getJoinColis(): ?Colis
                                     {
                                         return $this->joinColis;
                                     }

                                     public function setJoinColis(?Colis $joinColis): self
                                     {
                                         $this->joinColis = $joinColis;

                                         return $this;
                                     }
                                     
                                 
                                     
                                     
                                 
                                    
                                 
                                 
                                 }
