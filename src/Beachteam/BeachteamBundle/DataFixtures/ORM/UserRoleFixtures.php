<?php

namespace Beachteam\BeachteamBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\SecurityContext;

use Beachteam\BeachteamBundle\Entity\User;
use Beachteam\BeachteamBundle\Entity\Role;

class UserRoleFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // ROLE || ADMIN ||
        $role1 = new Role();
        $role1->setName('ROLE_ADMIN');
        $role1->setDescription('ADMIN OF THE WEBSITE');
        $manager->persist($role1);

        // ROLE || SUPERADMIN ||
        $role2 = new Role();
        $role2->setName('ROLE_SUPERADMIN');
        $role2->setDescription('SUPERADMIN OF THE WEBSITE');
        $manager->persist($role2);

        // USER || STEF ENGELS ||
        $user1 = new User();
        $user1->setUsername('stefengels');
        /*$factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user1);
        $password = $encoder->encodePassword('vcgavere', $user1->getSalt());
        $user1->setPassword($password);*/
        $user1->setPassword(password_hash('vcgavere', PASSWORD_BCRYPT, array('cost' => 15)));
        $user1->setFirstname('Stef');
        $user1->setSurname('Engels');
        $user1->setEmail('stefengels@hotmail.com');
        $user1->setCreated(new \DateTime('now'));
        $user1->setRole($role1);
        $manager->persist($user1);

        // USER || MAARTEN VANDENBROECKE ||
        $user2 = new User();
        $user2->setUsername('maartenvandenbroecke');
        /*$factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user2);
        $password = $encoder->encodePassword('vcgavere', $user2->getSalt());
        $user2->setPassword($password);*/
        $user2->setPassword(password_hash('vcgavere', PASSWORD_BCRYPT, array('cost' => 15)));
        $user2->setFirstname('Maarten');
        $user2->setSurname('Vandenbroecke');
        $user2->setEmail('maarten.vdb@telenet.be');
        $user2->setCreated(new \DateTime('now'));
        $user2->setRole($role1);
        $manager->persist($user2);

        $manager->flush();

        $this->addReference('user-1', $user1);
        $this->addReference('user-2', $user2);
    }

    public function getOrder()
    {
        return 1;
    }

}