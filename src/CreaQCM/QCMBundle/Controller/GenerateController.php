<?php

namespace CreaQCM\QCMBundle\Controller;

use CreaQCM\QCMBundle\Entity\Choice;
use CreaQCM\QCMBundle\Entity\Qcm;
use CreaQCM\QCMBundle\Entity\Question;
use CreaQCM\QCMBundle\Form\QcmType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GenerateController extends Controller
{
    public function getAction(Request $request)
    {
        $qcm = new Qcm();

        $choice1_1 = new Choice();
        $choice1_1->setValue('Test value 1');
        $choice1_2 = new Choice();
        $choice1_2->setValue('Test value 2');


        $question1 = new Question();
        $question1->setAsk('Test question');
        $question1->getChoices()->add($choice1_1);
        $question1->getChoices()->add($choice1_2);
        $qcm->getQuestions()->add($question1);

        /*$question2 = new Question();
        $question2->setAsk('Test question 2');
        $qcm->getQuestions()->add($question2);*/

        $form = $this->createForm(QcmType::class, $qcm);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('CreaQCMQCMBundle:Generate:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function newAction(Request $request){
        $qcm = new Qcm();

        $form = $this->createForm(QcmType::class, $qcm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eManager = $this->getDoctrine()->getManager();
            $eManager->persist($qcm);

            return $this->render('CreaQCMQCMBundle::layout.html.twig');
        }

        return $this->render('CreaQCMQCMBundle:Generate:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
