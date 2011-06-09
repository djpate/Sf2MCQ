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
			
		}
		
		public function isSelected(\Sf2MCQ\CoreBundle\Entity\Question $q,\Sf2MCQ\CoreBundle\Entity\Answer $a){
			$conn = $this->get('database_connection');
			$sql = 'SELECT answer_id FROM `proposition`,`proposition_answers` where test_id = ? and question_id = ? and answer_id = ? and proposition.id = proposition_answers.proposition_id';
			$conn->prepare($sql);
			$stmt->bindValue(1, $this->getId() );
			$stmt->bindValue(2, $q->getId() );
			$stmt->bindValue(3, $a->getId() );
			$res = $stmt->execute();
			if($res=1){
				return true;
			} else {
				return false;
			}
		}
	
	}

?>
