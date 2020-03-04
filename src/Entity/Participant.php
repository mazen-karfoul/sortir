<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipantRepository")
 */
class Participant implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string",length=30 , unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string",length=30)
     */
    private $nom;


    /**
     * @ORM\Column(type="string",length=30)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string",length=15,nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string",length=20,unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $administrateur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;


    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Inscrivant",mappedBy="participant")
     */
    private $inscrivants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sortie",mappedBy="organisateur")
     */
    private $sorties;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campus",inversedBy="participants")
     */
    private $campus;

    private $roles;







    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }


    /**
     * @return mixed
     */
    public function getAdministrateur()
    {
        return $this->administrateur;
    }

    /**
     * @param mixed $administrateur
     */
    public function setAdministrateur($administrateur): void
    {
        $this->administrateur = $administrateur;
    }

    /**
     * @return mixed
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * @param mixed $actif
     */
    public function setActif($actif): void
    {
        $this->actif = $actif;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    public function __construct()
    {
        $this->inscrivants = new ArrayCollection();
    }


    /**
     * @return ArrayCollection
     */
    public function getInscrivants(): ArrayCollection
    {
        return $this->inscrivants;
    }

    /**
     * @param ArrayCollection $inscrivants
     */

    public function setInscrivants(ArrayCollection $inscrivants): void
    {
        $this->inscrivants = $inscrivants;
    }

    /**
     * @return mixed
     */
    public function getSorties()
    {
        return $this->sorties;
    }

    /**
     * @param mixed $sorties
     */
    public function setSorties($sorties): void
    {
        $this->sorties = $sorties;
    }

    /**
     * @return mixed
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * @param mixed $campus
     */
    public function setCampus($campus): void
    {
        $this->campus = $campus;
    }


    /**
     * @return mixed
     */
    public function getIdparticipant()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setIdparticipant($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return ["ROLE_USER"];
    }


    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }


}
