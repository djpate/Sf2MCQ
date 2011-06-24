<?php

namespace Sf2MCQ\CoreBundle\Entity;

use Sf2MCQ\CoreBundle\Model\SubjectModel;

/**
 * Sf2MCQ\CoreBundle\Entity\Subject
 */
class Subject extends SubjectModel
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
     * @var Sf2MCQ\CoreBundle\Entity\Category
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
     * @param Sf2MCQ\CoreBundle\Entity\Category $category
     */
    public function setCategory(\Sf2MCQ\CoreBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Sf2MCQ\CoreBundle\Entity\Category $category
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var Sf2MCQ\CoreBundle\Entity\Interview
     */
    private $interviews;

    public function __construct()
    {
        $this->interviews = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add interviews
     *
     * @param Sf2MCQ\CoreBundle\Entity\Interview $interviews
     */
    public function addInterviews(\Sf2MCQ\CoreBundle\Entity\Interview $interviews)
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
    
    public function getLogo(){
		if($this->getLogoname()){
			return $this->getLogoname();
		}
	}
	
	public function setLogo($logo){
		/* this is not really secured (duh) but since it's from the admin it should be ok 
		 * TODO Secure it ! size + ext
		 * */
		
		$logo_root = __DIR__."/../../../../web/subject_logo";
		$subject_root = $logo_root."/".$this->id;
		
		if(!is_dir($subject_root)){
			mkdir($subject_root);
		}
		
		$logo->move($subject_root,$logo->getClientOriginalName());
		$this->setLogoname($logo->getClientOriginalName());
	}
    
    public function __toString(){
		return $this->name;
	}
    /**
     * @var text $logoname
     */
    private $logoname;


    /**
     * Set logoname
     *
     * @param text $logoname
     */
    public function setLogoname($logoname)
    {
        $this->logoname = $logoname;
    }

    /**
     * Get logoname
     *
     * @return text $logoname
     */
    public function getLogoname()
    {
        return $this->logoname;
    }
}
