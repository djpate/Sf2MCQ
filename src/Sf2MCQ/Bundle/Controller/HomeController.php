<?php

namespace Sf2MCQ\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('Sf2MCQBundle:Home:index.html.twig');
    }
}
