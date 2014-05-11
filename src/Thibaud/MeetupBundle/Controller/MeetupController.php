<?php

namespace Thibaud\MeetupBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Meetup controller.
 *
 */
class MeetupController extends BaseController
{
	/**
     * Lists all.
     *
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}