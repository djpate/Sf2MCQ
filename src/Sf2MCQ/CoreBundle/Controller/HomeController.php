<?php

namespace Sf2MCQ\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
		$em = $this->get('doctrine')->getEntityManager();
		
		$categories = $em->getRepository('Sf2MCQCoreBundle:Category')->findAll();
		
        return $this->render('Sf2MCQCoreBundle:Home:index.html.twig', array("categories"=> $categories) );
    }
}
