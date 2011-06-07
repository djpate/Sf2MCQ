<?php

namespace Sf2MCQ\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sf2MCQ\CoreBundle\Entity\Question;

class LoadQuestionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
		
		$question_array = new Question();
		$question_array->setContent("Qu'elle fonctions peut on utiliser pour afficher le contenu d'un Array");
		$question_array->setPoints("1");
		$question_array->setInterview($manager->merge($this->getReference("php_beginner")));
		
		$manager->persist($question_array);
		
		$question_file = new Question();
		$question_file->setContent("Qu'elle fonctions peut on utiliser pour lire le contenu d'un fichier");
		$question_file->setPoints("2");
		$question_file->setInterview($manager->merge($this->getReference("php_beginner")));
		
		$manager->persist($question_file);
		
		$this->addReference("question_array",$question_array);
		$this->addReference("question_file",$question_file);
		
		$manager->flush();

    }
    
    public function getOrder(){
		return 5;
	}
}

?>
