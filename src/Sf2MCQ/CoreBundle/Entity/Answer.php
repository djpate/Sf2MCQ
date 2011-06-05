<?php

namespace Sf2MCQ\CoreBundle\Entity;

/**
 * Sf2MCQ\CoreBundle\Entity\Answer
 */
class Answer
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
     * @var boolean $valid
     */
    private $valid;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Question
     */
    private $question;


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
     * Set valid
     *
     * @param boolean $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }

    /**
     * Get valid
     *
     * @return boolean $valid
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set question
     *
     * @param Sf2MCQ\CoreBundle\Entity\Question $question
     */
    public function setQuestion(\Sf2MCQ\CoreBundle\Entity\Question $question)
    {
        $this->question = $question;
    }

    /**
     * Get question
     *
     * @return Sf2MCQ\CoreBundle\Entity\Question $question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}