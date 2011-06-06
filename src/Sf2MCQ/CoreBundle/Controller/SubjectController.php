<?php

namespace Sf2MCQ\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SubjectController extends Controller
{
    public function indexAction($id,$slug)
    {	
		$em = $this->get('doctrine')->getEntityManager();
		$subject = $em->getRepository('Sf2MCQCoreBundle:Subject')->find($id);

        return $this->render('Sf2MCQCoreBundle:Subject:index.html.twig' , array("subject"=>$subject) );
    }
}
