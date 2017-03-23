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
    public function newAction(Request $request){
        $qcm = new Qcm();

        $question1 = new Question();
        $question1->setQcm($qcm);
        //$question1->setAsk('Test question');
        //$question1->getChoices()->add($choice1_1);
		
		$choice1_1 = new Choice();
		$choice1_1->setQuestion($question1);
        //$choice1_1->setValue('Test value 1');

        $question1->getChoices()->add($choice1_1);
        $qcm->getQuestions()->add($question1);

        $form = $this->createForm(QcmType::class, $qcm);
        $form->handleRequest($request);

        $checkValid = $request->request->get('checkValid');
        //var_dump($checkValid);

        if ($checkValid == "0"){
            $request->getSession()->getFlashBag()->add('info', 'Vous devez sélectionner au moins une réponse parmis vos propositions pour chaque question !');
            return $this->render('CreaQCMQCMBundle:Generate:form.html.twig', array(
                'form' => $form->createView(),
            ));
        }

        if ($form->isSubmitted() && $form->isValid()) {

            $eManager = $this->getDoctrine()->getManager();
            $eManager->persist($qcm);
            $eManager->flush();

            //var_dump($result);
            //var_dump($qcm);

            //return $this->render('CreaQCMQCMBundle::layout.html.twig');
            return $this->redirect($this->generateUrl('crea_qcmqcm_homepage'));
        }

        return $this->render('CreaQCMQCMBundle:Generate:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
