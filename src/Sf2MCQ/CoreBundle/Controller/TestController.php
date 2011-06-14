<?php

namespace Sf2MCQ\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sf2MCQ\CoreBundle\Entity\Proposition;
use Sf2MCQ\CoreBundle\Form\PropositionType;

class TestController extends Controller
{
	
    public function showAction($id)
    {	
		$verif = $this->verification($id);
		if(!is_null($verif)){
			return $verif;
		}
		
		$form = $this->createForm(new PropositionType($this->question), $this->proposition);

        return $this->render('Sf2MCQCoreBundle:Test:show.html.twig' , array( "form"=> $form->createView(), "test"=>$this->test , "question"=>$this->question ) );
    }
    
    public function answerAction($id){
		
		$request = $this->get('request');
		
		if ($request->getMethod() == 'POST'){
			
			$verif = $this->verification($id);
			if(!is_null($verif)){
				return $verif;
			}
			
			$form = $this->createForm(new PropositionType($this->question), $this->proposition);
			$form->bindRequest($request);
			
			if ($form->isValid()) {
				
				$em = $this->get('doctrine')->getEntityManager();
				$em->persist($this->proposition);
				$em->flush();

				
				$questions = $this->test->getInterview()->getQuestions()->toArray();
				$current_index = array_search($this->question,$questions);
				
				if( $current_index + 1 == count($questions) ){
					$this->get('session')->setFlash('notice', 'Vous êtes arrivé a la fin du test, vous pouvez encore modifier vos réponses ou terminer le test en cliquant sur <strong>terminer le test</strong>');
					return $this->redirect($this->generateUrl("test",array("id"=>$this->question->getId())));
				} else {
					$next_index = $current_index + 1;
					$next_question = $questions[$next_index];
					return $this->redirect($this->generateUrl("test",array("id"=>$next_question->getId())));
				}
				
			}
			
		}
				
	}
	
	private function verification($id){
		
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
		
		/* verif que la question demandé existe bien */
		$this->question = $em->getRepository('Sf2MCQCoreBundle:Question')->find($id);
		
		if(!$this->question){
			throw new NotFoundHttpException();
		}
		
		/* on setup la proposition */
		
		$this->proposition = $em->getRepository('Sf2MCQCoreBundle:Proposition')->findOneBy( array('test'=>$this->test->getId(), 'question'=>$this->question->getId()) );
		if(!$this->proposition){
			$this->proposition = new Proposition();
			$this->proposition->setQuestion($this->question);
			$this->proposition->setTest($this->test);
		}
		
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
