<?php

namespace Sf2MCQ\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('Sf2MCQHomeBundle:Default:index.html.twig');
    }
}
