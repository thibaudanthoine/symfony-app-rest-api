<?php

namespace Thibaud\MeetupBundle\Reporting;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Monolog\Logger;

class ReportingManager
{
    private $em;

    private $logger;

    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
    }

    public function getAll()
    {
        $this->logger->info('Generating CSV');

        $meetups = $this->em
            ->getRepository('ThibaudMeetupBundle:Meetup')
            ->findAll();

        $rows = array();
        foreach ($meetups as $meetup) {
            $rows[] = implode(',', array($meetup->getName(), $meetup->getTime()->format('Y-m-d H:i:s')));
        }

        return implode("\n", $rows);
    }

    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }
}