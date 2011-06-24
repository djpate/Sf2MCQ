<?php
namespace Sf2MCQ\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

class QuestionAdmin extends Admin
{
    protected $list = array(
        'content' => array('identifier' => true), // add edit link
        'interview',
        'points'
    );
    
    protected $formGroups = array(
		'Général' => array(
			'fields' => array("content","interview","points")
					),
		'Code' => array(
			'fields' => array("code","language")
					),
		'Réponse' => array(
			'fields' => array("answers")
					)
	);
    
    protected $form = array(
		'content',
        'interview',
        'points',
        'language',
        'code',
        'answers' => array(
            'edit' => 'inline',
            'inline' => 'table',
            'sortable' => 'position'
        )
	);
	
	protected $filter = array(
		'content',
        'interview',
        'points'
	);
	
}
?>
