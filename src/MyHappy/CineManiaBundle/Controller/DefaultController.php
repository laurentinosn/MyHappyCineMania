<?php

namespace MyHappy\CineManiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="home")
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

    /**
     * Portifólio
     * @Route("/portifolio", name="portifolio")
     * @Template() 
     * 
     */
    public function portifolioAction()
    {
        $em = $this->getDoctrine()->getManager();

        $filmes = $em->getRepository("MyHappyCineManiaBundle:Promocao")->findAll();
        $cinemas = $em->getRepository("MyHappyCineManiaBundle:Cinema")->findAll();

        return array("filmes" => $filmes,
            "cinemas" => $cinemas);
    }

}
