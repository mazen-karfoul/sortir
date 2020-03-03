<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class SortieController extends AbstractController
{
    /**
     * Céer une sortie
     * @Route("/add/{id}", name="sortie_add")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function add(EntityManagerInterface $em, Request $request)
    {

        //traiter le formulaire
        $sortie = new Sortie();
        $sortieform = $this->createForm(SortieType::class, $sortie);
        $sortieform->handleRequest($request);
        $sortie->setOrganisateur($this->getUser());

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
     *  @Route("/sortie/{id}", name="sortie_detail")
     */
    public function detail ($id)
    {
        //récupérer info d'une sortie dans la base de données
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $sortie = $sortieRepo->find($id);


       if ($sortie == null) {
            throw $this->createNotFoundException("Sortie inconnu");
        }
        return $this->render("sortie/detail.html.twig", [
                "sortie" => $sortie,

        ]);
    }




    /**
     * @Route("/liste", name="liste_sortie")
     * @Route("/liste/{id}", name="liste_sortie")

     */
    public function liste()
    {

        return $this->render("liste_sorties/liste.html.twig",[]);
    }


}


