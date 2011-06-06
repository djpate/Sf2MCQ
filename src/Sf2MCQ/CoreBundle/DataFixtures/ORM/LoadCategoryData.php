<?php

namespace Sf2MCQ\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sf2MCQ\CoreBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
        $prog = new Category();
        $prog->setName('Programmation');
        $manager->persist($prog);
        $manager->flush();
        
        $bdd = new Category();
        $bdd->setName('Base de donnée');
        $manager->persist($bdd);
        $manager->flush();
        
        $this->addReference("cat-prog",$prog);
        $this->addReference("cat-bdd",$bdd);
        
    }
    
    public function getOrder(){
		return 1;
	}
}

?>
