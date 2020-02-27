<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InscrivantRepository")
 */
class Inscrivant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Participant",inversedBy="inscrivats")
     */
    private $participant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sortie",inversedBy="inscrivants")
     */
    private $sortie;
}



