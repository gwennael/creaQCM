<?php

namespace CreaQCM\QCMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QCMController extends Controller
{
    public function indexAction()
    {
        return $this->render('CreaQCMQCMBundle::layout.html.twig');
    }
}
