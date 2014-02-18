<?php

namespace Beachteam\BeachteamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Beachteam\BeachteamBundle\Entity\Player;

class BioController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $players = $em->getRepository('BeachteamBundle:Player')->findAll();

        return $this->render('BeachteamBundle:Bio:index.html.twig', array(
            'players'      => $players,
        ));
    }

    public function editAction(Request $request)
    {
        return $this->render('BeachteamBundle:Default:index.html.twig');
    }
}
