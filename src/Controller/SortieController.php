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
     * @Route("/sortie", name="sortie_add")
     */
    public function add(EntityManagerInterface $em, Request $request)
    {

        //traiter le formulaire
       $sortie = new Sortie();
        $sortieForm = $this->createForm(SortieType::class, $sortie);
        $sortieForm->handleRequest($request);

        if ($sortieForm->isSubmitted() && $sortieForm->isValid()) {
            $sortie->setIdSortie(true);
            $sortie->setDateDebut(new\DateTime());

            $em->persist($sortie);
          $em->flush();


        }


        return $this->render('sortie/add.html.twig', ['sortieForm '=>$sortieForm->createView()]);
    }
}
