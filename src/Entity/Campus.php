<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampusRepository")
 */
class Campus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
   private $id;


    /**
     * @ORM\Column(type="string", length=30)
     */
   private $nom;

    /**
     * @return ArrayCollection
     */
    public function getSorties(): ArrayCollection
    {
        return $this->sorties;
    }

    /**
     * @param ArrayCollection $sorties
     */
    public function setSorties(ArrayCollection $sorties): void
    {
        $this->sorties = $sorties;
    }

    /**
     * @return mixed
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @param mixed $participants
     */
    public function setParticipants($participants): void
    {
        $this->participants = $participants;
    }


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sortie",mappedBy="campus")
     */
   private $sorties;
   public function __construct()
       {
          $this->sorties = new ArrayCollection();
       }

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
    public function setId($id): void
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
     * @ORM\OneToMany(targetEntity="App\Entity\Participant",mappedBy="campus")
     */
    private $participants;





}
