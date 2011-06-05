<?php

namespace Sf2MCQ\Bundle\Entity;

/**
 * Sf2MCQ\Bundle\Entity\Proposition
 */
class Proposition
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Sf2MCQ\Bundle\Entity\Question
     */
    private $question;

    /**
     * @var Sf2MCQ\Bundle\Entity\Answer
     */
    private $answers;

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
     * Set question
     *
     * @param Sf2MCQ\Bundle\Entity\Question $question
     */
    public function setQuestion(\Sf2MCQ\Bundle\Entity\Question $question)
    {
        $this->question = $question;
    }

    /**
     * Get question
     *
     * @return Sf2MCQ\Bundle\Entity\Question $question
     */
    public function getQuestion()
    {
        return $this->question;
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
}