<?php

namespace Sf2MCQ\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sf2MCQ\CoreBundle\Entity\Candidate;
use Sf2MCQ\CoreBundle\Entity\Test;


class InterviewController extends Controller
{
    public function indexAction($id)
    {	
		$em = $this->get('doctrine')->getEntityManager();
		$interview = $em->getRepository('Sf2MCQCoreBundle:Interview')->find($id);
		$candidat = new Candidate();
		
		if(!$interview){
			throw new NotFoundHttpException('Ce test n\'existe pas.');
		}
		
		$form = $this->createForm(new CandidateType(), $candidate);
		
		$request = $this->get('request');
		if($request->getMethod()=='POST'){
			$form->bindRequest($request);
			if ($form->isValid()) {
				
				$em->persist($candidat);
				$test = new Test();
				
			}
		}

        return $this->render('Sf2MCQCoreBundle:Interview:index.html.twig' , array( "interview"=>$interview, "form"=> $form->createView() ) );
    }
}
