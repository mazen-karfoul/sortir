<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Entity\Sortie;
use App\Form\ParticipantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils) : Response
    {
        $participant = new Participant();
        $participant= $this->getUser();

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();
        //$this->redirectToRoute("participant_profil",['id'=>$participant->getId()]);
        //$this->redirectToRoute('liste_sortie',['id'=>$participant->getId()]);
        $this->addFlash('success','the serie has been saves!');
        //return $this->redirectToRoute('',['id'=>$participant->getId()]);
        return $this->render('participant/login.html.twig', ['last_username' => $lastUsername, 'error' => $error    ]);
    }

    /**
     * @Route("/",name="participant_home")
     */

    public function home()
    {
        $participant = new Participant();
        $participant= $this->getUser();
        $repoSortie = $this->getDoctrine()->getRepository(Sortie::class);
        $sorties = $repoSortie->findAll();
        $participant = $this->getUser();
        return $this->render('liste_sorties/liste.html.twig', ["sorties"=>$sorties,"participant"=>$participant]);
    }

    /**
     * @Route("/logout",name="logout")
     */
    public function logout()
    {

    }

    /**
     * @Route("/profil/{id}",name="participant_profil")
     */
    public function modifielProfil($id, EntityManagerInterface $em, Request $request, UserPasswordEncoderInterface $encoder)
    {
        $participant = new Participant();
        $participant1 = new Participant();
        //$participant->setAdministrateur(true);
        //$participant->setActif(true);
        $participantForm = $this->createForm(ParticipantType::class, $participant);
        $participantRpo = $this->getDoctrine()->getRepository(Participant::class);
        $participant1 = $participantRpo->find($id);
        //$em->persist($participant1);
        //$em->flush();


        $participantForm->handleRequest($request);
        if ($participantForm->isSubmitted() && $participantForm->isValid()) {

            //hasher le mot de passe
            $hashed = $encoder->encodePassword($participant1, $participant1->getPassword());
            $participant1->setPassword($hashed);
            $participant1->setUsername($participant->getUsername());
            $participant1->setNom($participant->getNom());
            $participant1->setPrenom($participant->getPrenom());
            $participant1->setTelephone($participant->getTelephone());
            $participant1->setEmail($participant->getEmail());
            // hacher le mot de passe
            //hasher le mot de passe
            $hashed = $encoder->encodePassword($participant,$participant->getPassword());
            $participant->setPassword($hashed);
            $participant1->setPassword($participant->getPassword());
            $participant1->setCampus($participant->getCampus());
           // $file = $participant1->getPhoto();
           //$fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();


           // $participant1->setPhoto($fileName);

            //$participant = $participantForm->getData();


            $em->persist($participant1);
            $em->flush();

            $this->addFlash('success','the Idea has been added successfully');
            //return $this->redirectToRoute('idea_detail',['id'=>$idea->getId()]);
            return $this->redirectToRoute('participant_home',['id'=>$participant->getId()]);
        }
        return $this->render('participant/profil.html.twig', [
            "participantForm" => $participantForm->createView(),
            "participant1" => $participant1


        ]);
    }
}
