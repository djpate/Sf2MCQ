<?php
namespace Sf2MCQ\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


class SubjectAdmin extends Admin
{
    protected $list = array(
        'name' => array('identifier' => true), // add edit link
        'category' => array('edit' => 'list')
    );
    
    protected $form = array(
		'name',
		'category'
	);
	
	public function configureFormFields(FormMapper $form)
      {
          $form->addType('logo', 'file', array('required' => false));
      }


}
?>
