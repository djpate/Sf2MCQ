<?php

namespace Sf2MCQ\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sf2MCQ\CoreBundle\Entity\Proposition;

class TestController extends Controller
{
	
    public function showAction($index)
    {	
		$verif = $this->verification($index);
		if(!is_null($verif)){
			return $verif;
		}

        return $this->render('Sf2MCQCoreBundle:Test:show.html.twig' , array( "test"=>$this->test , "question"=>$this->question , "index"=>$index ) );
    }
    
    public function answerAction(){
		
		$request = $this->get('request');
		$em = $this->get('doctrine')->getEntityManager();
		$index = $request->request->get('index');
		
		$verif = $this->verification($index);
		if(!is_null($verif)){
			return $verif;
		}
		
		/* on verifie qu'il y a au moins une réponse */
		if( !$request->request->has('answers') ){
			$this->get('session')->setFlash('error', 'Vous n\'avez selectionné aucune réponse');
			return $this->redirect( $this->generateUrl("test", array("index"=>$index) ) );
		} 
		
		/* si le candidat a deja repondu a cette question on drop ces réponses */
		$proposition = $em->getRepository('Sf2MCQCoreBundle:Proposition')->findOneBy( array('test'=>$this->test->getId(), 'question'=>$this->question->getId()) );
		if(is_object($proposition)){
			$em->remove($proposition);
			$em->flush();
		}
		
		/* on save les nouvelles réponses */
		$proposition = new Proposition();
		$proposition->setQuestion($em->merge($this->question));
		$proposition->setTest($em->merge($this->test));
		
		$answers = $request->request->get('answers');
		foreach($answers as $answer){
			$entity = $em->getRepository('Sf2MCQCoreBundle:Answer')->find($answer);
			if($entity){
				$proposition->addAnswers($entity);
			}
		}
		
		$em->persist($proposition);
		$em->flush();
		
		if($index + 1 > $this->test->getInterview()->nbQuestion()){
			$this->get('session')->setFlash('notice', 'Vous êtes arrivé a la fin du test, vous pouvez encore modifier vos réponses ou terminer le test en cliquant sur <strong>terminer le test</strong>');
			return $this->redirect($this->generateUrl("test",array("index"=>$index)));
		} else {
			return $this->redirect($this->generateUrl("test",array("index"=>$index+1)));
		}
				
	}
	
	private function verification($index){
		
		$em = $this->get('doctrine')->getEntityManager();
		$session = $this->get('session');
		
		/* verif qu'un test a bien été demarrer */
		if(!$session->has('test')){
			return $this->redirect($this->generateUrl("homepage"));
		}
		
		/* verif que le test exist */
		$this->test = $em->getRepository('Sf2MCQCoreBundle:Test')->find($session->get('test'));
		
		if(!$this->test){
			return $this->redirect($this->generateUrl("homepage"));
		}
		
		/* verif que le temps imparti n'est pas fini */
		if($this->test->isOver()){
			return $this->redirect($this->generateUrl("test_finished"));
		}
		
		/* verif que l'index demandé existe bien */
		if($index > $this->test->getInterview()->nbQuestion()){
			throw new NotFoundHttpException();
		}
		
		$questions = $this->test->getInterview()->getQuestions();
		$this->question = $questions[$index-1];
		
		return null;
		
	}
    
    public function finishedAction(){
		
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
		
		$test->setEnd(new \datetime());
		$em->persist($test);
		$em->flush();
		
		$session->remove("test");
		
		return $this->render('Sf2MCQCoreBundle:Test:finished.html.twig' , array("test"=>$test) );
	}
	
}
