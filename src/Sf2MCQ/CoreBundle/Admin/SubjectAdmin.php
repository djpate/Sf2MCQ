<?php
namespace Sf2MCQ\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

class SubjectAdmin extends Admin
{
    protected $list = array(
        'name' => array('identifier' => true), // add edit link
        'category' => array('edit' => 'list')
    );
    
    protected $form = array(
		'name'
	);
}
?>
