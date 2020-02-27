<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=30,unique=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string",length=10,unique=true)
     */
    private $codePostal;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setIdVille($id): void
    {
        $this->id = $id;
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
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal): void
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return ArrayCollection
     */
    public function getLieus(): ArrayCollection
    {
        return $this->lieus;
    }

    /**
     * @param ArrayCollection $lieus
     */
    public function setLieus(ArrayCollection $lieus): void
    {
        $this->lieus = $lieus;
    }



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lieu",mappedBy="ville")
     */
    private $lieus;

    public function __construct()
        {

           $this->lieus = new ArrayCollection();
        }
}
