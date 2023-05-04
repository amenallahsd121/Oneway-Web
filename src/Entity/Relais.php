<?php

namespace App\Entity;

use App\Repository\RelaisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RelaisRepository::class)]
class Relais
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: "Tu dois saisir votre nom ")]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z]+$/',
        message: "Le nom  doit contenir des caractères alphabétiques uniquement."
    )]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: "Tu dois saisir votre prenom")]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z]+$/',
        message: "Le prenom  doit contenir des caractères alphabétiques uniquement."
    )]
    private ?string $lastname = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: "Tu dois saisir votre mot de passe")]
    #[Assert\Email(
        message: 'email {{ value }} est invalide',
    )]    
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    private ?string $adresse = null;

    #[ORM\Column(length: 20)]
    #[Assert\Regex(
        pattern : "/^(Ariana|Beja|Ben Arous|Bizerte|Gabes|Gafsa|Jendouba|Kairouan|Kasserine|Kebili|Kef|Mahdia|Manouba|Medenine|Monastir|Nabeul|Sfax|Sidi Bouzid|Siliana|Sousse|Tataouine|Tozeur|Tunis|Zaghouan)$/",
        message : "the city must be a valid Tunisian city."
    )]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $number = null;

    #[ORM\OneToMany(mappedBy: 'relai', targetEntity: Location::class)]
    private Collection $locations;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations->add($location);
            $location->setIdRelai($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getIdRelai() === $this) {
                $location->setIdRelai(null);
            }
        }

        return $this;
    }
}
