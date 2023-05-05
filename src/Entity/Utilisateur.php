<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Tu dois saisir votre nom ")]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z]+$/',
        message: "Le nom  doit contenir des caractères alphabétiques uniquement."
    )]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Tu dois saisir votre prenom")]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z]+$/',
        message: "Le prenom  doit contenir des caractères alphabétiques uniquement."
    )]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(
        message: 'email {{ value }} est invalide',
    )]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    //#[Assert\NotBlank(message:"Please enter your birthday")]
   // #[Assert\Regex(pattern:"/^\d{4}-\d{2}-\d{2}$/", message:"Please enter a valid birthday in the format yyyy-mm-dd")]
   // #[Assert\LessThan("-100 years", message:"You cannot be over 100 years old")]
    #[Assert\LessThanOrEqual("today", message:"Your birthday cannot be in the future")]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Tu dois saisir votre mot de passe")]
    #[Assert\Regex(pattern: "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", message: "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.")]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    private ?int $nb_point = null;

    #[ORM\Column(nullable: true)]
    private ?int $code = null;


   

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNbPoint(): ?int
    {
        return $this->nb_point;
    }

    public function setNbPoint(?int $nb_point): self
    {
        $this->nb_point = $nb_point;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }
}
