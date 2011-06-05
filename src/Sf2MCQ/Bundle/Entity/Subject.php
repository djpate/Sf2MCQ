<?php

namespace Sf2MCQ\Bundle\Entity;

/**
 * Sf2MCQ\Bundle\Entity\Subject
 */
class Subject
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
     * @var text $description
     */
    private $description;

    /**
     * @var Sf2MCQ\Bundle\Entity\Category
     */
    private $category;


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
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set category
     *
     * @param Sf2MCQ\Bundle\Entity\Category $category
     */
    public function setCategory(\Sf2MCQ\Bundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Sf2MCQ\Bundle\Entity\Category $category
     */
    public function getCategory()
    {
        return $this->category;
    }
}