<?php

namespace Sf2MCQ\CoreBundle\Model;

use Sf2MCQ\CoreBundle\Helper\StringHelper;

	abstract class SubjectModel{
	
		public function getSlug(){
			return StringHelper::slugify($this->getName());
		}
	
	}

?>
