<?php

namespace Sf2MCQ\CoreBundle\Model;

	abstract class InterviewModel{
	
		public function prettyDuration(){
			return $this->getDuration()." minutes";
		}
		
		public function nbQuestion(){
			return count($this->getQuestions());
		}
	
	}

?>
