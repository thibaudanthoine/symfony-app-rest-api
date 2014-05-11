<?php

namespace Thibaud\MeetupBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

use Thibaud\MeetupBundle\Reporting\MeetupReportManager;

class ReportController extends BaseController
{
    public function allMeetupsAction()
    {
        $reportingManager = $this->container->get('thibaud_meetup.reporting.reporting_manager');
        $content = $reportingManager->getAll();

        $response = new Response($content);
        $response->headers->set('Content-Type', 'text/csv');

        return $response;
    }
}