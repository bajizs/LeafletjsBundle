<?php

namespace CNT\LeafletjsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CNTLeafletjsBundle:Default:index.html.twig');
    }
}
