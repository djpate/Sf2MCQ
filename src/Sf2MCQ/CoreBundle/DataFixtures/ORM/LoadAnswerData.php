<?php

namespace Sf2MCQ\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sf2MCQ\CoreBundle\Entity\Answer;

class LoadAnswerData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load($manager)
    {
		
		$q_array = $manager->merge($this->getReference("question_array"));
		$q_file = $manager->merge($this->getReference("question_file"));
		$q_code = $manager->merge($this->getReference("question_code"));
		
		$answer1 = new Answer();
		$answer1->setContent("echo");
		$answer1->setValid(0);
		$answer1->setQuestion($q_array);
		$manager->persist($answer1);
		
		$answer2 = new Answer();
		$answer2->setContent("print_r");
		$answer2->setValid(1);
		$answer2->setQuestion($q_array);
		$manager->persist($answer2);
		
		$manager->flush();
		
		$answer3 = new Answer();
		$answer3->setContent("print");
		$answer3->setValid(0);
		$answer3->setQuestion($q_array);
		$manager->persist($answer3);
		
		$answer4 = new Answer();
		$answer4->setContent("var_dump");
		$answer4->setValid(1);
		$answer4->setQuestion($q_array);
		$manager->persist($answer4);
		$manager->flush();
		
		$answer5 = new Answer();
		$answer5->setContent("dump");
		$answer5->setValid(0);
		$answer5->setQuestion($q_array);
		$manager->persist($answer5);
		$manager->flush();
		
		$answer6 = new Answer();
		$answer6->setContent("array_ptr");
		$answer6->setValid(0);
		$answer6->setQuestion($q_array);
		$manager->persist($answer6);
		$manager->flush();
		
		
		$answer7 = new Answer();
		$answer7->setContent("file_get_content");
		$answer7->setValid(0);
		$answer7->setQuestion($q_file);
		$manager->persist($answer7);
		$manager->flush();
		
		$answer8 = new Answer();
		$answer8->setContent("file_put_content");
		$answer8->setValid(0);
		$answer8->setQuestion($q_file);
		$manager->persist($answer8);
		$manager->flush();
		
		$answer9 = new Answer();
		$answer9->setContent("rien");
		$answer9->setValid(0);
		$answer9->setQuestion($q_code);
		$manager->persist($answer9);
		$manager->flush();
		
		$answer10 = new Answer();
		$answer10->setContent("hello");
		$answer10->setValid(1);
		$answer10->setQuestion($q_code);
		$manager->persist($answer10);
		$manager->flush();

    }
    
    public function getOrder(){
		return 7;
	}
}

?>
