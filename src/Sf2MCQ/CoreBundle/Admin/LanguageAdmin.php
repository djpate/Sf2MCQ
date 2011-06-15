<?php
namespace Sf2MCQ\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

class LanguageAdmin extends Admin
{
    protected $list = array(
        'name' => array('identifier' => true), // add edit link
        'code'
    );
    
    protected $form = array(
		'name',
		'code'
	);
	
	protected $filter = array(
		'name',
		'code'
	);
}
?>
