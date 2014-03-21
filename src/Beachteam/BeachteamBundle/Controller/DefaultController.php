<?php

namespace Beachteam\BeachteamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

use Beachteam\BeachteamBundle\Entity\Enquiry;

use Beachteam\BeachteamBundle\Form\Type\EnquiryType;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $players = $em->getRepository('BeachteamBundle:Player')->findAll();
        $repository = $em->getRepository('BeachteamBundle:Article');

        $articles = $repository->createQueryBuilder('a')
            ->where('a.deleted is NULL')
            ->getQuery()
            ->getResult();

        $tournaments = $em->getRepository('BeachteamBundle:Tournament')->findAll();

        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact enquiry from symblog')
                    ->setFrom('enquiries@symblog.co.uk')
                    ->setTo($this->container->getParameter('beachteam.emails.contact_email'))
                    ->setBody($this->renderView('BeachteamBundle:Default:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);


                $this->get('session')->getFlashBag()->add('contact-notice','Your contact enquiry was successfully sent. Thank you!');

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('BeachteamBundle_contactpage'));
            }
        }

        return $this->render('BeachteamBundle:Default:index.html.twig', array(
            'players'      => $players,
            'articles'     => $articles,
            'tournaments'      => $tournaments,
            'form' => $form->createView(),
        ));

    }
}
