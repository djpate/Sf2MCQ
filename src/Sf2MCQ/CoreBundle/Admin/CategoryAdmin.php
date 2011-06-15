<?php
namespace Sf2MCQ\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

class CategoryAdmin extends Admin
{
    protected $list = array(
        'name' => array('identifier' => true), // add edit link
    );
    
    protected $form = array(
		'name'
	);
}
?>
