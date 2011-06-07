<?php

namespace Sf2MCQ\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sf2MCQ\CoreBundle\Entity\Candidate;
use Sf2MCQ\CoreBundle\Entity\Test;
use Sf2MCQ\CoreBundle\Form\CandidateType;


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
		
		$form = $this->createForm(new CandidateType(), $candidat);
		
		$request = $this->get('request');
		if($request->getMethod()=='POST'){
			$form->bindRequest($request);
			
			if ($form->isValid()) {
				/* le formulaire est valide du coup on creer le test en base
				 * on save le test en session et on redirige vers la page de test */
				$em->persist($candidat);
				$em->flush();
				
				$test = new Test();
				$test->setInterview($em->merge($interview));
				$test->setCandidate($em->merge($candidat));
				$test->setStart(new \Datetime());
				
				$em->persist($test);
				$em->flush();
				
				$session = $this->get('session');
				$session->set('test',$test->getId());
				
				return $this->redirect($this->generateUrl('test', array("index"=>1))); // l'index correspond non pas a un id de question mais a la premiere question du test
				
			}
		}

        return $this->render('Sf2MCQCoreBundle:Interview:index.html.twig' , array( "interview"=>$interview, "form"=> $form->createView() ) );
    }
}
