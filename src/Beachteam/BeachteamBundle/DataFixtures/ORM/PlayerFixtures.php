<?php

namespace Beachteam\BeachteamBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Beachteam\BeachteamBundle\Entity\Player;
use Beachteam\BeachteamBundle\Entity\Media;

class PlayerFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // PLAYER || STEF ENGELS ||
        $player1 = new Player();
        $player1->setName('Stef Engels');
        $player1->setFacebookUrl('https://www.facebook.com/stef.engels?fref=ts');
        $player1->setEmail('stefengels@hotmail.com');
        $player1->setBirthplace('Kruishoutem');
        $player1->setBirthdate(new \DateTime('now'));
        $player1->setNationality('Belg');
        $player1->setClub('VC Gavere');
        $player1->setPosiition('Opposite');

        $media1 = new Media();
        $media1->setUrl('stef.jpg');
        $media1->setMimetype('image/jpeg');
        $manager->persist($media1);

        $player1->setMedia($media1);

        $manager->persist($player1);

        // PLAYER || MAARTEN VANDENBROECKE ||
        $player2 = new Player();
        $player2->setName('Maarten Vandenbroecke');
        $player2->setFacebookUrl('https://www.facebook.com/maarten.vandenbroecke?fref=ts');
        $player2->setEmail('maarten.vdb@telenet.be');
        $player2->setBirthplace('Gavere');
        $player2->setBirthdate(new \DateTime('now'));
        $player2->setNationality('Belg');
        $player2->setClub('VC Gavere');
        $player2->setPosiition('Midden');

        $media2 = new Media();
        $media2->setUrl('maarten.jpg');
        $media2->setMimetype('image/jpeg');
        $manager->persist($media2);

        $player2->setMedia($media2);

        $manager->persist($player2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }

}