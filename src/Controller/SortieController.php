<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class SortieController extends AbstractController
{
    /**
     * Céer une sortie
     * @Route("/add", name="sortie_add")
     */
    public function add()
    {

        return $this->render("sortie/add.html.twig");
    }

    /**
     * @Route("/liste", name="liste_sortie")
     */
    public function liste()
    {

        return $this->render("liste_sorties/liste.html.twig");
    }
}
