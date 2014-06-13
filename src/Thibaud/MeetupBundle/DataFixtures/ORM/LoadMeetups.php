<?php

namespace Thibaud\MeetupBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Thibaud\MeetupBundle\Entity\Meetup;

/**
 * Class LoadMeetups
 *
 * @package Thibaud\MeetupBundle\DataFixtures\ORM
 */
class LoadMeetups extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = $this->getReference('user-user');

        $meetup = new Meetup();
        $meetup->setName('Meet me at the Coffee Shop');
        $meetup->setLocation('New-York');
        $meetup->setTime(new \DateTime('tomorrow noon'));
        $meetup->setDescription('We can dance like Iggy');
        $meetup->setOwner($user);
        $manager->persist($meetup);

        $manager->flush();
    }

    public function getOrder()
    {
        return 20;
    }
}