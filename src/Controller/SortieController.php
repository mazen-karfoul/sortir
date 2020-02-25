<?php

namespace App\Controller;

use App\Entity\Sortie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class SortieController extends AbstractController
{
    /**
     * @Route("/sortie", name="sortie")
     */
    public function add(EntityManagerInterface $em, Request $request)
    {
        /**
         * Créer une sortie
         * @Route("/add", name="sortie_add")
         */
        //traiter le formulaire
    $sortie = new Sortie();
        $sortieForm = $this->createForm(SortieType::class, $sortie);
        $sortieForm->handleRequest($request);

        return $this->render('sortie/add.html.twig', ["sortieForm"=>$sortieForm->createView()

        ]);
    }
}
