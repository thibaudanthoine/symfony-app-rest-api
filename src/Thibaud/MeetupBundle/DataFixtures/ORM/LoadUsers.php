<?php

namespace Thibaud\MeetupBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Thibaud\MeetupBundle\Entity\User;

/**
 * Class LoadUsers
 *
 * @package Thibaud\MeetupBundle\DataFixtures\ORM
 */
class LoadUsers extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('user');
        $user->setPlainPassword('user');
        $user->setEnabled(true);
        $user->setEmail('user@example.com');
        $user->setRoles(array('ROLE_USER'));
        
        $manager->persist($user);
        
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPlainPassword('admin');
        $admin->setEnabled(true);
        $admin->setEmail('admin@example.com');
        $admin->setRoles(array('ROLE_ADMIN'));
        
        $manager->persist($admin);
        
        $manager->flush();

        $this->addReference('user-user', $user);
    }

    public function getOrder()
    {
        return 10;
    }
}