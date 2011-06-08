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
	
	}

?>
