<?php

namespace Sf2MCQ\Bundle\Entity;

/**
 * Sf2MCQ\Bundle\Entity\Level
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
     * @var Sf2MCQ\Bundle\Entity\Interview
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
     * @param Sf2MCQ\Bundle\Entity\Interview $interviews
     */
    public function addInterviews(\Sf2MCQ\Bundle\Entity\Interview $interviews)
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
}