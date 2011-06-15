<?php

namespace Sf2MCQ\CoreBundle\Model;

	abstract class TestModel{
	
		public function isOver(){
			$start = $this->getStart();
			
			if( ($start->format("U") + (60 * $this->getInterview()->getDuration())) > time() ){
				return false;
			} else {
				return true;
			}
			
		}
		
		public function timeleft(){
			$start = $this->getStart();
			return ($start->format("U") + (60 * $this->getInterview()->getDuration())) - time();
		}
		
		public function isAnswered(\Sf2MCQ\CoreBundle\Entity\Question $q){
			
			$propositions = $this->getPropositions();
			
			if(count($propositions) > 0 ){
				foreach($propositions as $proposition){
					if($proposition->getQuestion() == $q){
						return true;
					}
				}
			}
			
			return false;
			
		}
	
	}

?>
