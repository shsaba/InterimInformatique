<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('InterimInformatiqueBundle:Front:index.html.twig', array('name' => $name));
    }
}
