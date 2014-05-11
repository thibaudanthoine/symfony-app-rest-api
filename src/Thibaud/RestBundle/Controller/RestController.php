<?php

namespace Thibaud\RestBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RestController extends Controller
{
	  /**
     * @return \Thibaud\MeetupBundle\Entity\User
     */
    public function getUser()
    {
        return parent::getUser();
    }

	  /**
     * @param type $username
     *
     * @View(serializerGroups={"Default","Details"})
     */
  	public function getUserAction($username)
  	{
  		$user = $this->getDoctrine()->getManager()
    			->getRepository('ThibaudMeetupBundle:User')
    			->findOneByUsername($username);
  		
  		if(!$user) {
          throw $this->createNotFoundException(sprintf('User %s not found', $username));
  		}

  		return $user;
  	}

	  /**
     * @View(serializerGroups={"Default","Me","Details"})
     */
  	public function getMeAction()
  	{
      	$this->forwardIfNotAuthenticated();

      	return $this->getUser();
  	}

  	/**
   	 * Shortcut to throw a AccessDeniedException($message) if the user is not authenticated
   	 *
   	 * @param String $message The message to display (default:'warn.user.notAuthenticated')
   	 */
  	protected function forwardIfNotAuthenticated($message = 'warn.user.notAuthenticated')
  	{
        if (!$this->getUser()) {
          	throw new AccessDeniedException($message);
        }
  	}
}