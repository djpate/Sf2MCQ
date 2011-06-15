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
    
    protected $form = array(
		'content',
        'interview',
        'points',
        'language',
        'code',
        'answers' => array(
            'edit' => 'inline',
        ),
	);
	
	protected $filter = array(
		'content',
        'interview',
        'points'
	);
}
?>
