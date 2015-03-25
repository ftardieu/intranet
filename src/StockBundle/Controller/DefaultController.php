<?php

namespace StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StockBundle:Default:index.html.twig');
    }

    public function sortieAction()
    {
    	return $this->render('StockBundle:Default:sortie.html.twig');
    }


    public function evacuationAction()
    {
    	return $this->render('StockBundle:Default:evacuation.html.twig');
    }


    public function ficheProduitAction()
    {
    	return $this->render('StockBundle:Default:ficheProduit.html.twig');
    }



}
