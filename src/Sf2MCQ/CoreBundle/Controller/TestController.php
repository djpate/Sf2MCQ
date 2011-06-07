<?php

namespace Sf2MCQ\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class TestController extends Controller
{
    public function showAction($index)
    {	
		$em = $this->get('doctrine')->getEntityManager();
		$session = $this->get('session');
		
		/* verif qu'un test a bien été demarrer */
		if(!$session->has('test')){
			return $this->redirect($this->generateUrl("homepage"));
		}
		
		/* verif que le test exist */
		$test = $em->getRepository('Sf2MCQCoreBundle:Test')->find($session->get('test'));
		if(!$test){
			return new \Exception("Current test does not exist");
		}
		
		/* verif que le temps imparti n'est pas fini */
		if($test->isOver()){
			return $this->redirect($this->generateUrl("test_finished"));
		}
		
		/* verif que l'index demandé existe bien */
		if($index > $test->getInterview()->nbQuestion()){
			throw new NotFoundHttpException();
		}
		
		$questions = $test->getInterview()->getQuestions();
		$question = $questions[$index-1];

        return $this->render('Sf2MCQCoreBundle:Test:show.html.twig' , array( "test"=>$test , "question"=>$question ) );
    }
    
    public function finishedAction(){
		return $this->render('Sf2MCQCoreBundle:Test:finished.html.twig');
	}
}
