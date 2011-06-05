<?php

namespace Sf2MCQ\Bundle\Entity;

/**
 * Sf2MCQ\Bundle\Entity\Question
 */
class Question
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var integer $points
     */
    private $points;

    /**
     * @var Sf2MCQ\Bundle\Entity\Answer
     */
    private $answers;

    /**
     * @var Sf2MCQ\Bundle\Entity\Interview
     */
    private $interview;

    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set points
     *
     * @param integer $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * Get points
     *
     * @return integer $points
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Add answers
     *
     * @param Sf2MCQ\Bundle\Entity\Answer $answers
     */
    public function addAnswers(\Sf2MCQ\Bundle\Entity\Answer $answers)
    {
        $this->answers[] = $answers;
    }

    /**
     * Get answers
     *
     * @return Doctrine\Common\Collections\Collection $answers
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set interview
     *
     * @param Sf2MCQ\Bundle\Entity\Interview $interview
     */
    public function setInterview(\Sf2MCQ\Bundle\Entity\Interview $interview)
    {
        $this->interview = $interview;
    }

    /**
     * Get interview
     *
     * @return Sf2MCQ\Bundle\Entity\Interview $interview
     */
    public function getInterview()
    {
        return $this->interview;
    }
}