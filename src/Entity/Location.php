<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location", indexes={@ORM\Index(name="id_relai", columns={"id_relai"})})
 * @ORM\Entity
 */
class Location
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=20, nullable=false)
     */
    private $adresse;

    /**
     * @var float
     *
     * @ORM\Column(name="Xaxe", type="float", precision=10, scale=0, nullable=false)
     */
    private $xaxe;

    /**
     * @var float
     *
     * @ORM\Column(name="Yaxe", type="float", precision=10, scale=0, nullable=false)
     */
    private $yaxe;

    /**
     * @var int
     *
     * @ORM\Column(name="id_relai", type="integer", nullable=false)
     */
    private $idRelai;


}
