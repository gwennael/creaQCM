<?php

namespace CreaQCM\QCMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QCMController extends Controller
{
    public function indexAction()
    {
        return $this->render('CreaQCMQCMBundle::layout.html.twig');
    }

    public function listAction()
    {
        $eManager = $this->getDoctrine()->getManager();
        $listQCM = $eManager->getRepository('CreaQCMQCMBundle:Qcm')->findAll();


        return $this->render('CreaQCMQCMBundle:Qcm:list.html.twig', array('listQCM' => $listQCM));
    }

    public function answerAction($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $qcm = $eManager->getRepository('CreaQCMQCMBundle:Qcm')->find($id);

        $questions = $qcm->getQuestions()->getValues();
        //var_dump(sizeof($questions));
        //var_dump($questions[0]->getAsk());

        $listQuestion = array();

        foreach ($questions as $key => $question) {
            $listQuestion[$key]['question'] = $question->getAsk();
            $choices = $eManager->getRepository('CreaQCMQCMBundle:Choice')->findBy(array('question' => $question->getId()));
            //var_dump($choices[0]->getValue());
            foreach ($choices as $key2 => $choice) {
                $listQuestion[$key]['choices'][$key2] = $choice->getValue();
            }
        }

        echo '<pre>';
        var_dump($listQuestion);
        echo '</pre>';


        return $this->render('CreaQCMQCMBundle:Answer:show.html.twig', array('listQuestion' => $listQuestion, 'qcm' => $qcm));
    }
}
