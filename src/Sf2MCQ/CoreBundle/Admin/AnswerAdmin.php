<?php
namespace Sf2MCQ\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

class AnswerAdmin extends Admin
{
    protected $list = array(
        'content' => array('identifier' => true), // add edit link
        'valid' => array("type"=>"boolean")
    );
    
    protected $form = array(
		'content' => array('form_field_options' => array('required' => true)),
        'question' => array('edit' => 'standard','inline' => 'table'),
        'valid' => array("type"=>"boolean")
	);
	
	protected $filter = array(
		'content',
        'valid' => array("type"=>"boolean")
	);
}
?>
