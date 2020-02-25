<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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

    public function  home()
            {
                return $this->render('participant/home.html.twig',[]);
            }
}
