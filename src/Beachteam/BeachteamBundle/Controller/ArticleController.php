<?php

namespace Beachteam\BeachteamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

use Beachteam\BeachteamBundle\Entity\Article;

class ArticleController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('BeachteamBundle:Article')->findAll();

        return $this->render('BeachteamBundle:Article:index.html.twig', array(
            'articles'      => $articles,
        ));
    }

    public function detailAction($id)
    {
        return $this->render('BeachteamBundle:Default:index.html.twig');
    }

    public function createAction(Request $request)
    {
        return $this->render('BeachteamBundle:Default:index.html.twig');
    }
}
