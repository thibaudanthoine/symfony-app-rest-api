<?php

namespace Thibaud\MeetupBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * User entity
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Thibaud\MeetupBundle\Repository\UserRepository")
 *
 * @ExclusionPolicy("all") 
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Expose
     * @Groups({"Me"})
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Thibaud\MeetupBundle\Entity\Meetup", mappedBy="owner")
     */
    protected $meetups;

    public function __construct()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->locked = false;
        $this->expired = false;
        $this->roles = array('ROLE_USER');
        $this->credentialsExpired = false;
        $this->meetups = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Thibaud\MeetupBundle\Entity\Meetup[] 
     */
    public function getMeetups()
    {
        return $this->meetups;
    }

    /**
     * @param ArrayCollection $meetups
     */
    public function setMeetups($meetups)
    {
        $this->meetups = $meetups;
        return $this;
    }

    /**
     * Get the formatted name
     * 
     * @return String
     *
     * @VirtualProperty 
     */
    public function getUsedName()
    {
        return sprintf(
            '%s (%s)',
            ucfirst(strtolower($this->getUserName())),
            $this->getEmail()
        );
    }  
}