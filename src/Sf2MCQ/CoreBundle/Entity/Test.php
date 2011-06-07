<?php

namespace Sf2MCQ\CoreBundle\Entity;

/**
 * Sf2MCQ\CoreBundle\Entity\Test
 */
class Test
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var datetime $start
     */
    private $start;

    /**
     * @var datetime $end
     */
    private $end;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Proposition
     */
    private $propositions;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Candidate
     */
    private $candidate;

    public function __construct()
    {
        $this->propositions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set start
     *
     * @param datetime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * Get start
     *
     * @return datetime $start
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param datetime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * Get end
     *
     * @return datetime $end
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Add propositions
     *
     * @param Sf2MCQ\CoreBundle\Entity\Proposition $propositions
     */
    public function addPropositions(\Sf2MCQ\CoreBundle\Entity\Proposition $propositions)
    {
        $this->propositions[] = $propositions;
    }

    /**
     * Get propositions
     *
     * @return Doctrine\Common\Collections\Collection $propositions
     */
    public function getPropositions()
    {
        return $this->propositions;
    }

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
    /**
     * @var Sf2MCQ\CoreBundle\Entity\Test
     */
    private $interview;


    /**
     * Set interview
     *
     * @param Sf2MCQ\CoreBundle\Entity\Test $interview
     */
    public function setInterview(\Sf2MCQ\CoreBundle\Entity\Test $interview)
    {
        $this->interview = $interview;
    }

    /**
     * Get interview
     *
     * @return Sf2MCQ\CoreBundle\Entity\Test $interview
     */
    public function getInterview()
    {
        return $this->interview;
    }
}