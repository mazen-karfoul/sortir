<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ParticipantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('participant/login.html.twig', [

        ]);
    }

    /**
     * @Route("/",name="participant_home")
     */

    public function home()
    {
        return $this->render('participant/home.html.twig', []);
    }

    /**
     * @Route("/logout",name="logout")
     */
    public function logout()
    {

    }

    /**
     * @Route("/profil",name="participant_profil")
     */
    public function modifielProfil(EntityManagerInterface $em, Request $request,UserPasswordEncoderInterface $encoder)
    {
        $participant = new Participant();
        $participant->setAdministrateur(true);
        $participant->setActif(true);
        $participantForm = $this->createForm(ParticipantType::class, $participant);

        $participantForm->handleRequest($request);
        if ($participantForm->isSubmitted() && $participantForm->isValid()) {

            //hasher le mot de passe
            $hashed = $encoder->encodePassword($participant,$participant->getPassword());
            $participant->setPassword($hashed);

            $em->persist($participant);
            $em->flush();

            return $this->redirectToRoute('participant_home');
        }
        return $this->render('participant/profil.html.twig', [
            "participantForm" => $participantForm->createView()
        ]);
    }
}
