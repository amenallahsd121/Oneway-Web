<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trajetoffre
 *
 * @ORM\Table(name="trajetoffre", uniqueConstraints={@ORM\UniqueConstraint(name="AddOffre", columns={"AddArriveOffre", "AddDepartOffre"}), @ORM\UniqueConstraint(name="description", columns={"description"})})
 * @ORM\Entity
 */
class Trajetoffre
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdTrajetOffre", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtrajetoffre;

    /**
     * @var int
     *
     * @ORM\Column(name="LimiteKmOffre", type="integer", nullable=false)
     */
    private $limitekmoffre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AddArriveOffre", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $addarriveoffre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="AddDepartOffre", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $adddepartoffre = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="NbreEscaleOffre", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $nbreescaleoffre = NULL;

    /**
     * @var int
     *
     * @ORM\Column(name="nbreOffre", type="integer", nullable=false)
     */
    private $nbreoffre = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    public function getIdtrajetoffre(): ?string
    {
        return $this->idtrajetoffre;
    }

    public function getLimitekmoffre(): ?int
    {
        return $this->limitekmoffre;
    }

    public function setLimitekmoffre(int $limitekmoffre): self
    {
        $this->limitekmoffre = $limitekmoffre;

        return $this;
    }

    public function getAddarriveoffre(): ?string
    {
        return $this->addarriveoffre;
    }

    public function setAddarriveoffre(?string $addarriveoffre): self
    {
        $this->addarriveoffre = $addarriveoffre;

        return $this;
    }

    public function getAdddepartoffre(): ?string
    {
        return $this->adddepartoffre;
    }

    public function setAdddepartoffre(?string $adddepartoffre): self
    {
        $this->adddepartoffre = $adddepartoffre;

        return $this;
    }

    public function getNbreescaleoffre(): ?int
    {
        return $this->nbreescaleoffre;
    }

    public function setNbreescaleoffre(?int $nbreescaleoffre): self
    {
        $this->nbreescaleoffre = $nbreescaleoffre;

        return $this;
    }

    public function getNbreoffre(): ?int
    {
        return $this->nbreoffre;
    }

    public function setNbreoffre(int $nbreoffre): self
    {
        $this->nbreoffre = $nbreoffre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
