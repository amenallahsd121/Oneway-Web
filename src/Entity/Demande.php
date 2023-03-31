<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande", indexes={@ORM\Index(name="IdColis", columns={"IdColis"}), @ORM\Index(name="IdOffre", columns={"IdOffre"}), @ORM\Index(name="demande_ibfk_3", columns={"IdPersonne"})})
 * @ORM\Entity
 */
class Demande
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdDemande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddemande;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionDemande", type="string", length=255, nullable=false)
     */
    private $descriptiondemande;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \Colis
     *
     * @ORM\ManyToOne(targetEntity="Colis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdColis", referencedColumnName="id_colis")
     * })
     */
    private $idcolis;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdPersonne", referencedColumnName="id")
     * })
     */
    private $idpersonne;

    /**
     * @var \Offre
     *
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdOffre", referencedColumnName="IdOffre")
     * })
     */
    private $idoffre;


}
