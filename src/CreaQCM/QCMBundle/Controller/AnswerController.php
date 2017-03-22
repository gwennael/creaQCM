<?php

namespace CreaQCM\QCMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnswerController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function postAction(Request $request, $id){
        if ($request->isMethod('POST')) {

            $name = $request->request->get('name');
            $checkboxs = $request->request->get('myCheckbox');

            if (empty($checkboxs)){
                return $this->redirectToRoute('crea_qcmqcm_list');
            }

            $eManager = $this->getDoctrine()->getManager();

            $qcm = $eManager->getRepository('CreaQCMQCMBundle:Qcm')->find($id);
            $questions = $qcm->getQuestions()->getValues();

            var_dump($qcm->getId());

            $listResult = array();
            foreach ($checkboxs as $key => $checkbox) {
                $listResult[$key] = implode(',', $checkbox);
                $response = $questions[$key-1]->getResponse();

                if ($listResult[$key] == $response){
                    var_dump(true);
                }
                else{
                    var_dump(false);
                }
            }

            var_dump($listResult);

            //return $this->redirectToRoute('crea_qcmqcm_list');
            //return $this->render('ynovtpNoteBundle:Fibo:result.html.twig', array('listFiboNombre' => $listFiboNombre, 'dernierFiboNombre' => $dernierFiboNombre));
        }
        else{
            return $this->redirectToRoute('crea_qcmqcm_list');
        }
    }
}
