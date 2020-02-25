<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/login", name="participant_login")
     */
    public function login()
    {
        return $this->render('participant/login.html.twig', [

        ]);
    }
}
