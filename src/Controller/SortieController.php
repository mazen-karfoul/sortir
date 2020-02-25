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
        //traiter le formulaire
    $sortie = new Sortie();

        return $this->render('sortie/index.html.twig', [
            'controller_name' => 'SortieController',
        ]);
    }
}
