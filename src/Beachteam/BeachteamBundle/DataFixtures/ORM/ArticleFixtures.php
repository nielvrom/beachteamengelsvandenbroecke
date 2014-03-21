<?php

namespace Beachteam\BeachteamBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\SecurityContext;

use Beachteam\BeachteamBundle\Entity\User;
use Beachteam\BeachteamBundle\Entity\Article;
use Beachteam\BeachteamBundle\Entity\Item;

class ArticleFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // DUMMY ARTICLE 1
        $article1 = new Article();
        $article1->setTitle('Dummy title 1');
        $article1->setDescription('Nullam quis risus eget urna mollis ornare vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $article1->setUser($manager->merge($this->getReference('user-1')));
        $article1->setBody('Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec id elit non mi porta gravida at eget metus. Duis mollis,
        est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec sed odio dui.');
        $manager->persist($article1);

        // DUMMY ARTICLE 2
        $article2 = new Article();
        $article2->setTitle('Dummy title 2');
        $article2->setDescription('Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vestibulum id ligula porta felis euismod semper.');
        $article2->setUser($manager->merge($this->getReference('user-2')));
        $article2->setBody('Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.
        Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.');
        $manager->persist($article2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}