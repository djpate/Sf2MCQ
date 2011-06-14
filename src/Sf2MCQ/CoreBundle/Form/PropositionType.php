<?php

namespace Sf2MCQ\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityRepository;

class PropositionType extends AbstractType
{
	
	public function __construct($question){
		$this->question = $question;
	}
	
    public function buildForm(FormBuilder $builder, array $options)
    {
		$form = $this;

        $builder->add('answers', 'entity',
										array(	'class' => 'Sf2MCQ\\CoreBundle\\Entity\\Answer',
												'query_builder' => function(EntityRepository $er) use ($form) {
													return $er->createQueryBuilder('a')
																->add('where','a.question = :question')
																->setParameter('question',$form->question->getId());
												},
												'multiple' => 'true',
												'expanded' => 'true',
												'property' => 'content'
											 )
					 );
    }
}

?>
