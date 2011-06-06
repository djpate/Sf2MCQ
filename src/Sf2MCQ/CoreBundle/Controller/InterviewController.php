<?php

namespace Sf2MCQ\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class InterviewController extends Controller
{
    public function indexAction($id)
    {	
		$em = $this->get('doctrine')->getEntityManager();
		$interview = $em->getRepository('Sf2MCQCoreBundle:Interview')->find($id);
		
		if(!$interview){
			throw new NotFoundHttpException('Ce test n\'existe pas.');
		}

        return $this->render('Sf2MCQCoreBundle:Interview:index.html.twig' , array("interview"=>$interview) );
    }
}
