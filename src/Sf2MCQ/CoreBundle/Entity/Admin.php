<?php

namespace Sf2MCQ\CoreBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * Sf2MCQ\CoreBundle\Entity\Admin
 */
class Admin extends BaseUser
{
    /**
     * @var integer $id
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}