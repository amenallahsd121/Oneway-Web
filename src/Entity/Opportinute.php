<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opportinute
 *
 * @ORM\Table(name="opportinute")
 * @ORM\Entity
 */
class Opportinute
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_opp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOpp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="depart", type="string", length=50, nullable=false)
     */
    private $depart;

    /**
     * @var float
     *
     * @ORM\Column(name="heur_depart", type="float", precision=10, scale=0, nullable=false)
     */
    private $heurDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="arrivee", type="string", length=255, nullable=false)
     */
    private $arrivee;

    /**
     * @var float
     *
     * @ORM\Column(name="heur_arrivee", type="float", precision=10, scale=0, nullable=false)
     */
    private $heurArrivee;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;


}
