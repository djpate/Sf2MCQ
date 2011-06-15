<?php
namespace Sf2MCQ\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

class InterviewAdmin extends Admin
{
    protected $list = array(
        'name' => array('identifier' => true), // add edit link
        'level',
        'subject',
        'duration'
    );
    
    protected $form = array(
		'name',
        'level',
        'subject',
        'duration',
	);
	
	protected $filter = array(
		'name',
        'level',
        'subject',
        'duration'
	);
}
?>
