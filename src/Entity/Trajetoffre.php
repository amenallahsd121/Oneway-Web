<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\TrajetoffreRepository;

#[ORM\Entity(repositoryClass: TrajetoffreRepository::class)]
class Trajetoffre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idtrajetoffre = null;
    

    
#[ORM\Column]

private ?int $limitekmoffre = null;
    

    #[ORM\Column(length: 255)]
    private ?string $addarriveoffre= null;


    #[ORM\Column(length: 255)]
    private ?string $adddepartoffre= null;
    

    #[ORM\Column]

private ?int $nbreescaleoffre = null;

    
#[ORM\Column]

private ?int $nbreoffre = null;
    
#[ORM\Column]
private ?string  $description = null;
    

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

    public function setDescription(): self
    {
        $this->description = $this->getAdddepartoffre() . ' - ' . $this->getAddarriveoffre();

        return $this;
    }

    public function __toString()
    {
        return $this->getDescription(); // Return the title of the task as the string representation
    }
}
