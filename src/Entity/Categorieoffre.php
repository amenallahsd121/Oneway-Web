<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorieoffre
 *
 * @ORM\Table(name="categorieoffre", uniqueConstraints={@ORM\UniqueConstraint(name="TypeOffre", columns={"TypeOffre"})})
 * @ORM\Entity
 */
class Categorieoffre
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdCatOffre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcatoffre;

    /**
     * @var float
     *
     * @ORM\Column(name="poidsOffre", type="float", precision=10, scale=0, nullable=false)
     */
    private $poidsoffre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbreColisOffre", type="integer", nullable=false)
     */
    private $nbrecolisoffre;

    /**
     * @var string
     *
     * @ORM\Column(name="TypeOffre", type="string", length=255, nullable=false)
     */
    private $typeoffre;


}
