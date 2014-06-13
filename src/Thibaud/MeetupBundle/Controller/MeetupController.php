<?php

namespace Thibaud\MeetupBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class MeetupController
 *
 * @package Thibaud\MeetupBundle\Controller
 */
class MeetupController extends Controller
{
    /**
     * Lists all
     *
     * @Template()
     * @return array
     */
    public function indexAction()
    {
        return array();
    }
}