<?php

namespace CreaQCM\QCMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatsController extends Controller
{
    public function indexAction($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $qcm = $eManager->getRepository('CreaQCMQCMBundle:Qcm')->find($id);
        $results = $eManager->getRepository('CreaQCMQCMBundle:Resultat')->findBy(array('qcm' => $id));

        //var_dump($results[0]->getResult());

        $listResult = array();
        foreach ($results as $result) {
            array_push($listResult, $result->getResult());
        }
        //var_dump($listResult);

        $moyenne = round(array_sum($listResult)/sizeof($listResult), 2);
        //var_dump($moyenne);

        $listResultDataChart = array();
        for ($i=0; $i<=20; $i++){
            if (in_array($i, $listResult)){
                array_push($listResultDataChart, count(array_keys($listResult, $i)));
            }
            else{
                array_push($listResultDataChart, 0);
            }
        }

        //var_dump($listResultDataChart);
        $listResultDataChartString = implode(',', $listResultDataChart);

        return $this->render('CreaQCMQCMBundle:Stats:show.html.twig', array('qcm' => $qcm, 'moyenne' => $moyenne, 'listResultDataChartString' => $listResultDataChartString, 'results' => $results));
    }
}
