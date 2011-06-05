<?php

namespace Sf2MCQ\Bundle\Entity;

/**
 * Sf2MCQ\Bundle\Entity\Category
 */
class Category
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
     * @var Sf2MCQ\Bundle\Entity\Subject
     */
    private $subjects;

    public function __construct()
    {
        $this->subjects = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add subjects
     *
     * @param Sf2MCQ\Bundle\Entity\Subject $subjects
     */
    public function addSubjects(\Sf2MCQ\Bundle\Entity\Subject $subjects)
    {
        $this->subjects[] = $subjects;
    }

    /**
     * Get subjects
     *
     * @return Doctrine\Common\Collections\Collection $subjects
     */
    public function getSubjects()
    {
        return $this->subjects;
    }
}