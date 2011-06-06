<?php

namespace Sf2MCQ\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sf2MCQ\CoreBundle\Entity\Interview;

class LoadInterviewData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
		
		$php_beginner = new Interview();
		$php_beginner->setLevel($manager->merge($this->getReference("beginner")));
		$php_beginner->setSubject($manager->merge($this->getReference("php")));
		$php_beginner->setName("Notions de PHP5 OO");
		$php_beginner->setDuration(30);
		
		$manager->persist($php_beginner);
		
		$php_rookie = new Interview();
		$php_rookie->setLevel($manager->merge($this->getReference("rookie")));
		$php_rookie->setSubject($manager->merge($this->getReference("php")));
		$php_rookie->setName("Maitrise de PHP5 OO");
		$php_rookie->setDuration(60);
		
		$manager->persist($php_rookie);
		
		$manager->flush();

    }
    
    public function getOrder(){
		return 4;
	}
}

?>
