<?php
	namespace Sf2MCQ\CoreBundle\Form;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilder;
	
	class CandidateType extends AbstractType
	{
		public function buildForm(FormBuilder $builder, array $options)
		{
			$builder->add('firstname','text',array('label'=>'Prénom'));
			$builder->add('lastname','text',array('label'=>'Nom'));
		}
	}
	
?>
