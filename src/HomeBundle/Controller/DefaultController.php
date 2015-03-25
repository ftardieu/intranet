<?php

namespace HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HomeBundle:Default:index.html.twig', array('name' => $name));
    }

        public function homeAction()
    {
    	return $this->render('HomeBundle:Default:home.html.twig');
    }
}
