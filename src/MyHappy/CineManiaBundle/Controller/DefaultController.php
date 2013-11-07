<?php

namespace MyHappy\CineManiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/home", name="home")
     * @Template()
     */
    public function indexAction($name = "neto")
    {
        return array('name' => $name);
    }
    
    /**
     * @Route("/menu")
     * @Template()
     */
    public function menuAction()
    {
        return array();
    }
}
