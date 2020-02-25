<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SortieRepository")
 */
class Sortie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idSortie;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCloture;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbInscriptionsMax;

    /**
     * @ORM\Column(type="text", length=500)
     */
    private $descriptionInfos;

    /**
     * @ORM\Column(type="integer")
     */
    private $etatSortie;

    /**
     * @return mixed
     */
    public function getIdSortie()
    {
        return $this->idSortie;
    }

    /**
     * @param mixed $idSortie
     */
    public function setIdSortie($idSortie): void
    {
        $this->idSortie = $idSortie;
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
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree): void
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getDateCloture()
    {
        return $this->dateCloture;
    }

    /**
     * @param mixed $dateCloture
     */
    public function setDateCloture($dateCloture): void
    {
        $this->dateCloture = $dateCloture;
    }

    /**
     * @return mixed
     */
    public function getNbInscriptionsMax()
    {
        return $this->nbInscriptionsMax;
    }

    /**
     * @param mixed $nbInscriptionsMax
     */
    public function setNbInscriptionsMax($nbInscriptionsMax): void
    {
        $this->nbInscriptionsMax = $nbInscriptionsMax;
    }

    /**
     * @return mixed
     */
    public function getDescriptionInfos()
    {
        return $this->descriptionInfos;
    }

    /**
     * @param mixed $descriptionInfos
     */
    public function setDescriptionInfos($descriptionInfos): void
    {
        $this->descriptionInfos = $descriptionInfos;
    }

    /**
     * @return mixed
     */
    public function getEtatSortie()
    {
        return $this->etatSortie;
    }

    /**
     * @param mixed $etatSortie
     */
    public function setEtatSortie($etatSortie): void
    {
        $this->etatSortie = $etatSortie;
    }

    /**
     * @return mixed
     */
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }

    /**
     * @param mixed $urlPhoto
     */
    public function setUrlPhoto($urlPhoto): void
    {
        $this->urlPhoto = $urlPhoto;
    }

    /**
     * @return mixed
     */
    public function getOrganisateur()
    {
        return $this->organisateur;
    }

    /**
     * @param mixed $organisateur
     */
    public function setOrganisateur($organisateur): void
    {
        $this->organisateur = $organisateur;
    }

    /**
     * @return mixed
     */
    public function getLieuxNoLieu()
    {
        return $this->lieuxNoLieu;
    }

    /**
     * @param mixed $lieuxNoLieu
     */
    public function setLieuxNoLieu($lieuxNoLieu): void
    {
        $this->lieuxNoLieu = $lieuxNoLieu;
    }

    /**
     * @return mixed
     */
    public function getEtatsNoEtat()
    {
        return $this->etatsNoEtat;
    }

    /**
     * @param mixed $etatsNoEtat
     */
    public function setEtatsNoEtat($etatsNoEtat): void
    {
        $this->etatsNoEtat = $etatsNoEtat;
    }

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $urlPhoto;

    /**
     * @ORM\Column(type="string")
     */
    private $organisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $lieuxNoLieu;

    /**
     * @ORM\Column(type="integer")
     */
    private $etatsNoEtat;
}
