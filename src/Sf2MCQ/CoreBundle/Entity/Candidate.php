<?php

namespace Sf2MCQ\CoreBundle\Entity;

/**
 * Sf2MCQ\CoreBundle\Entity\Candidate
 */
class Candidate
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $firstname
     */
    private $firstname;

    /**
     * @var string $lastname
     */
    private $lastname;

    /**
     * @var Sf2MCQ\CoreBundle\Entity\Test
     */
    private $tests;

    public function __construct()
    {
        $this->tests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string $firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string $lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Add tests
     *
     * @param Sf2MCQ\CoreBundle\Entity\Test $tests
     */
    public function addTests(\Sf2MCQ\CoreBundle\Entity\Test $tests)
    {
        $this->tests[] = $tests;
    }

    /**
     * Get tests
     *
     * @return Doctrine\Common\Collections\Collection $tests
     */
    public function getTests()
    {
        return $this->tests;
    }
}