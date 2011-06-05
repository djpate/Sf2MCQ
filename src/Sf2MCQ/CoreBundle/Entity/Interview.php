<?php

namespace Sf2MCQ\CoreBundle\Entity;

/**
 * Sf2MCQ\CoreBundle\Entity\Interview
 */
class Interview
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
     * @var string $duration
     */
    private $duration;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Question
     */
    private $questions;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Level
     */
    private $level;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Subject
     */
    private $subject;

    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set duration
     *
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Get duration
     *
     * @return string $duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Add questions
     *
     * @param Sf2MCQ\CoreBundle\Entity\Question $questions
     */
    public function addQuestions(\Sf2MCQ\CoreBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;
    }

    /**
     * Get questions
     *
     * @return Doctrine\Common\Collections\Collection $questions
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set level
     *
     * @param Sf2MCQ\CoreBundle\Entity\Level $level
     */
    public function setLevel(\Sf2MCQ\CoreBundle\Entity\Level $level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return Sf2MCQ\CoreBundle\Entity\Level $level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set subject
     *
     * @param Sf2MCQ\CoreBundle\Entity\Subject $subject
     */
    public function setSubject(\Sf2MCQ\CoreBundle\Entity\Subject $subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get subject
     *
     * @return Sf2MCQ\CoreBundle\Entity\Subject $subject
     */
    public function getSubject()
    {
        return $this->subject;
    }
}