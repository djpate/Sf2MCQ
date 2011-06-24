<?php

namespace Sf2MCQ\CoreBundle\Entity;
use Symfony\Component\Validator\ExecutionContext;


/**
 * Sf2MCQ\CoreBundle\Entity\Proposition
 */
class Proposition
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Question
     */
    private $question;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Answer
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

    /**
     * Add answers
     *
     * @param Sf2MCQ\CoreBundle\Entity\Answer $answers
     */
    public function addAnswers(\Sf2MCQ\CoreBundle\Entity\Answer $answers)
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
     * @var Sf2MCQ\CoreBundle\Entity\Test
     */
    private $test;


    /**
     * Set test
     *
     * @param Sf2MCQ\CoreBundle\Entity\Test $test
     */
    public function setTest(\Sf2MCQ\CoreBundle\Entity\Test $test)
    {
        $this->test = $test;
    }

    /**
     * Get test
     *
     * @return Sf2MCQ\CoreBundle\Entity\Test $test
     */
    public function getTest()
    {
        return $this->test;
    }
    /**
     * @var Sf2MCQ\CoreBundle\Entity\Candidate
     */
    private $candidate;


    /**
     * Set candidate
     *
     * @param Sf2MCQ\CoreBundle\Entity\Candidate $candidate
     */
    public function setCandidate(\Sf2MCQ\CoreBundle\Entity\Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    /**
     * Get candidate
     *
     * @return Sf2MCQ\CoreBundle\Entity\Candidate $candidate
     */
    public function getCandidate()
    {
        return $this->candidate;
    }
    
    public function hasAnswers(ExecutionContext $context){
		if ( count($this->answers) === 0 ) {
			$property_path = $context->getPropertyPath() . '.answers.[0].count';
            $context->setPropertyPath($property_path);
			$context->addViolation('You have to pick at least one answer...', array(), null);
		}
	}

}