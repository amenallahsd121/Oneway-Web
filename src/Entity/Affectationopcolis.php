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
                                     private ?int $id_aff = null ;
                              


                                     #[ORM\ManyToOne(targetEntity: Opportinute::class,inversedBy: 'id_opp')]
                                     #[ORM\JoinColumn(name: "id_opp", referencedColumnName: "id_opp")]
                                     protected $id_opp;
                     
                                  


                                     #[ORM\OneToOne(targetEntity: Colis::class, inversedBy: 'id_coliss')]
                                     #[ORM\JoinColumn(name: "id_colis", referencedColumnName: "id_colis")]
                                     protected $id_colis ;



            
                                     public function getIdAff(): ?int
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
                                     
                                 
                                     
                                     
                                 
                                    
                                 
                                 
                                 }
