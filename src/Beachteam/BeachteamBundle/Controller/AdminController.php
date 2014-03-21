<?php

namespace Beachteam\BeachteamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

use Beachteam\BeachteamBundle\Entity\User;

use Beachteam\BeachteamBundle\Form\Type\LoginType;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('BeachteamBundle:Admin:index.html.twig');

    }

    public function createAction(Request $request)
    {
        $article = new Article();

        $form = $this->createForm(new ArticleType(), $article, [
            'action' => $this->generateUrl('BeachteamBundle_article_create')
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirect($this->generateUrl('BeachteamBundle_articlepage'));
        }

        return [
            'articleForm' => $form->createView(),
        ];
    }

    public function loginAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(new LoginType(), $user);

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $session = $request->getSession();
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('BeachteamBundle:Admin:login.html.twig', array(
            'loginForm'  => $form->createView(),
            'loginError' => $error,
        ));
    }

    public function bioAction()
    {

    }

    public function tournamentsAction()
    {

    }

    public function articlesAction()
    {

    }

    public function picturesAction()
    {

    }

    public function sponsorsAction()
    {

    }
}
