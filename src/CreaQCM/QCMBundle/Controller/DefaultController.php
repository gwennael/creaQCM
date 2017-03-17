<?php

namespace CreaQCM\QCMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CreaQCMQCMBundle:Default:index.html.twig');
    }
}
