<?php

namespace App\Entity;

<<<<<<< HEAD
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;




#[ORM\MappedSuperclass]
#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]

=======
use App\Repository\UtilisateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
>>>>>>> origin/main
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
<<<<<<< HEAD
    private ?int $id = null ;



    #[ORM\Column(length:50)]
    private ?string $name = null ;
   

    #[ORM\Column(length:50)]
    private ?string $lastname = null ;
   
    #[ORM\Column(length:50)]
    private ?string $email = null ;
   


    #[ORM\Column(length:50)]
    private ?string $adresse = null ;


    #[ORM\Column(length:50)]
    private ?string $type = null ;
    

    #[ORM\Column(type: "date")]
    private $birthdate;


    #[ORM\Column(length:50)]
    private ?string $password = null ;
  

    #[ORM\Column(length:50)]
    private ?int $nbPoint = null ;
 

    #[ORM\Column(length:50)]
    private ?int $code = null ;

=======
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
    #[Assert\NotBlank(message:"Please enter your birthday")]
    #[Assert\Regex(pattern:"/^\d{4}-\d{2}-\d{2}$/", message:"Please enter a valid birthday in the format yyyy-mm-dd")]
    #[Assert\LessThan("-100 years", message:"You cannot be over 100 years old")]
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


    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $stayLoggedIn;

    

    public function getStayLoggedIn(): bool
    {
        return $this->stayLoggedIn;
    }

    public function setStayLoggedIn(bool $stayLoggedIn): self
    {
        $this->stayLoggedIn = $stayLoggedIn;

        return $this;
    }
>>>>>>> origin/main

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
<<<<<<< HEAD
        return $this->nbPoint;
    }

    public function setNbPoint(int $nbPoint): self
    {
        $this->nbPoint = $nbPoint;
=======
        return $this->nb_point;
    }

    public function setNbPoint(?int $nb_point): self
    {
        $this->nb_point = $nb_point;
>>>>>>> origin/main

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
<<<<<<< HEAD

}
=======
}
>>>>>>> origin/main
