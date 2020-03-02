<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormTypeInterface;


class SortieController extends AbstractController
{
    /**
     * Céer une sortie
     * @Route("/add", name="sortie_add")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function add(EntityManagerInterface $em, Request $request)
    {

        //traiter le formulaire
        $sortie = new Sortie();
        $sortieform = $this->createForm(SortieType::class, $sortie);
        $sortieform->handleRequest($request);

        if ($sortieform->isSubmitted() && $sortieform->isValid()) {



            $em->persist($sortie);
            $em->flush();
        }

        return $this->render("sortie/add.html.twig", [
            "sortieForm" => $sortieform->createView(),
            'sortie' => $sortie

        ]);
    }

    /**
     * Affichage du détail d'une sortie
     *
     */



    /**
     * @Route("/liste", name="liste_sortie")
     * @Route("/liste/{id}", name="liste_sortie")

     */
    public function liste()
    {

        return $this->render("liste_sorties/liste.html.twig",[]);
    }
}
