<?php

namespace Beachteam\BeachteamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

use Beachteam\BeachteamBundle\Entity\Tournament;

class TournamentController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tournaments = $em->getRepository('BeachteamBundle:Tournament')->findAll();

        return $this->render('BeachteamBundle:Tournament:index.html.twig', array(
            'tournaments'      => $tournaments,
        ));
    }

    public function editAction(Request $request)
    {
        return $this->render('BeachteamBundle:Default:index.html.twig');
    }
}
