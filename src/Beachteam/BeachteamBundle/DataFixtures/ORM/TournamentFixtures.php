<?php

namespace Beachteam\BeachteamBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\SecurityContext;

use Beachteam\BeachteamBundle\Entity\Tournament;

class TournamentFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // TOURNAMENTS
        $tournament1 = new Tournament();
        $tournament1->setStart(new \DateTime(date('2014-05-5')));
        $tournament1->setEnd(new \DateTime(date('2014-05-6')));
        $tournament1->setLocation('Brussel');
        $tournament1->setType('Belgian Beach Volley');
        $manager->persist($tournament1);

        $tournament2 = new Tournament();
        $tournament2->setStart(new \DateTime(date('2014-05-12')));
        $tournament2->setEnd(new \DateTime(date('2014-05-13')));
        $tournament2->setLocation('Hechtel');
        $tournament2->setType('Belgian Beach Volley');
        $manager->persist($tournament2);

        $tournament3 = new Tournament();
        $tournament3->setStart(new \DateTime(date('2014-05-20')));
        $tournament3->setEnd(new \DateTime(date('2014-05-21')));
        $tournament3->setLocation('Gent');
        $tournament3->setType('Belgian Beach Volley');
        $manager->persist($tournament3);

        $tournament4 = new Tournament();
        $tournament4->setStart(new \DateTime(date('2014-06-16')));
        $tournament4->setEnd(new \DateTime(date('2014-06-17')));
        $tournament4->setLocation('Kortrijk');
        $tournament4->setType('Belgian Beach Volley');
        $manager->persist($tournament4);

        $tournament5 = new Tournament();
        $tournament5->setStart(new \DateTime(date('2014-05-31')));
        $tournament5->setEnd(new \DateTime(date('2014-06-01')));
        $tournament5->setLocation('Sint-Niklaas');
        $tournament5->setType('Belgian Beach Volley');
        $manager->persist($tournament5);

        $tournament6 = new Tournament();
        $tournament6->setStart(new \DateTime(date('2014-07-07')));
        $tournament6->setEnd(new \DateTime(date('2014-07-08')));
        $tournament6->setLocation('Hannut');
        $tournament6->setType('Belgian Beach Volley');
        $manager->persist($tournament6);

        $tournament7 = new Tournament();
        $tournament7->setStart(new \DateTime(date('2014-07-21')));
        $tournament7->setEnd(new \DateTime(date('2014-07-22')));
        $tournament7->setLocation('Leuven');
        $tournament7->setType('Belgian Beach Volley');
        $manager->persist($tournament7);

        $tournament8 = new Tournament();
        $tournament8->setStart(new \DateTime(date('2014-08-04')));
        $tournament8->setEnd(new \DateTime(date('2014-08-05')));
        $tournament8->setLocation('Maaseik');
        $tournament8->setType('Belgian Beach Volley');
        $manager->persist($tournament8);

        $tournament9 = new Tournament();
        $tournament9->setStart(new \DateTime(date('2014-09-10')));
        $tournament9->setEnd(new \DateTime(date('2014-09-12')));
        $tournament9->setLocation('Knokke');
        $tournament9->setType('Belgian Beach Volley');
        $manager->persist($tournament9);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }

}