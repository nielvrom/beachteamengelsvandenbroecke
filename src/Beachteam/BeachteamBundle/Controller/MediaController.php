<?php

namespace Beachteam\BeachteamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

use Beachteam\BeachteamBundle\Entity\Media;
use Beachteam\BeachteamBundle\Form\Type\MediaType;

class MediaController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('BeachteamBundle:Media');

        $query = $repo->createQueryBuilder("m")
            ->join('m.item', 'i')
            ->select('DISTINCT i.id')
            ->where('m.type != :type')
            ->setParameter('type', 'player')
            ->getQuery();

        $images = $query->getResult();

        return $this->render('BeachteamBundle:Media:index.html.twig', array(
            'images'      => $images,
        ));
    }

    public function detailAction($id)
    {
        /*$em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
        ));*/
    }

    public function createAction(Request $request)
    {
        /*if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $user = $this->get('security.context')
            ->getToken()
            ->getUser();*/

        $media = new Media();
        $form = $this->createForm(new MediaType(), $media);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                return $this->redirect($this->generateUrl('BeachteamBundle_contactpage'));
            }
        }

        return $this->render('BeachteamBundle:Media:create.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
