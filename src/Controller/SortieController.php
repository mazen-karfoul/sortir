<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        $sortie = new Sortie();
        $sortieform = $this->createForm(SortieType::class, $sortie);

        $sortieform->handleRequest($request);
        if ($sortieform->isSubmitted())
            $em->persist($sortie);
            $em->flush();



        return $this->render("sortie/add.html.twig", [
            "sortieForm" => $sortieform->createView(),
            'sortie' => $sortie

        ]);
    }

    /**
     * @Route("/liste/{id}", name="liste_sortie")
     */
    public function liste()
    {


        return $this->render("liste_sorties/liste.html.twig",[]);
    }



    public function annulerMaSortie($id, Request $request, EntityManagerInterface $em)
    {
        $motifForm = $this->createForm(MotifAnnulationType::class);
        $motifForm->handleRequest($request);
        $sortieRepo = $em->getRepository(Sortie::class);
        $sortie = $sortieRepo->findbyId($id);
        $user = $this->getUser();
        $etatRepo = $em->getRepository(Etat::class);
        $etat = $etatRepo->find(6);
        $motif = $motifForm->get('MotifAnnulation')->getData();
        $sortie->setMotifAnnulation($motif);
        $sortie->setEtat($etat);
        if ($motifForm->isSubmitted() && $motifForm->isValid() && $user == $sortie->getOrganise()) {
            $em->flush($sortie);
            $this->addFlash('success', 'Votre sortie "' . $sortie->getNom() . '" a bien été annulée !');
            return $this->redirectToRoute('sorties_afficher');
        }
        return $this->render('sortie_afficher/annulerSortie.html.twig', [
            "motifForm" => $motifForm->createView(),
            "sortie" => $sortie
        ]);
    }
}
