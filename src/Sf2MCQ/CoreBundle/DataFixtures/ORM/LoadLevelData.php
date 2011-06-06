<?php

namespace Sf2MCQ\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sf2MCQ\CoreBundle\Entity\Level;

class LoadLevelData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
		
		$beginner = new Level();
		$beginner->setName("Débutant");
		$manager->persist($beginner);
		
		$rookie = new Level();
		$rookie->setName("Confirmé");
		$manager->persist($rookie);
		
		$expert = new Level();
		$expert->setName("Expert");
		$manager->persist($expert);
		
		$this->addReference("beginner",$beginner);
		$this->addReference("rookie",$rookie);
		$this->addReference("expert",$expert);
		
		$manager->flush();
        
    }
    
    public function getOrder(){
		return 3;
	}
}

?>
