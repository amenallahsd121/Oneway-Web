<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse", indexes={@ORM\Index(name="reponse_ibfk_1", columns={"id_reclamation"})})
 * @ORM\Entity
 */
class Reponse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reponse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReponse;

    /**
     * @var string
     *
     * @ORM\Column(name="text_rep", type="string", length=255, nullable=false)
     */
    private $textRep;

    /**
     * @var \Reclamation
     *
     * @ORM\ManyToOne(targetEntity="Reclamation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reclamation", referencedColumnName="id_reclamation")
     * })
     */
    private $idReclamation;

    public function getIdReponse(): ?int
    {
        return $this->idReponse;
    }

    public function getTextRep(): ?string
    {
        return $this->textRep;
    }

    public function setTextRep(string $textRep): self
    {
        $this->textRep = $textRep;

        return $this;
    }

    public function getIdReclamation(): ?Reclamation
    {
        return $this->idReclamation;
    }

    public function setIdReclamation(?Reclamation $idReclamation): self
    {
        $this->idReclamation = $idReclamation;

        return $this;
    }


}
