<?php

namespace Sf2MCQ\CoreBundle\Entity;

/**
 * Sf2MCQ\CoreBundle\Entity\Level
 */
class Level
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Interview
     */
    private $interviews;

    public function __construct()
    {
        $this->interviews = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add interviews
     *
     * @param Sf2MCQ\CoreBundle\Entity\Interview $interviews
     */
    public function addInterviews(\Sf2MCQ\CoreBundle\Entity\Interview $interviews)
    {
        $this->interviews[] = $interviews;
    }

    /**
     * Get interviews
     *
     * @return Doctrine\Common\Collections\Collection $interviews
     */
    public function getInterviews()
    {
        return $this->interviews;
    }
    
    public function __toString(){
		return $this->name;
	}
}
