<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * Class InvisibleController
 * @Route("/invisible")
 */
class InvisibleController extends Controller
{
    /**
     * @Route("/{branche}", name="invisible_liste")
     * @Method("GET")
     */
    public function listAction($branche)
    {
        $em = $this->getDoctrine()->getManager();
        $participants = $em->getRepository('AppBundle:Participant')->findListBranche($branche);
        $regions = $em->getRepository("AppBundle:Region")->findAll();
        $districts = $em->getRepository("AppBundle:District")->findAll();

        return $this->render('participant/index.html.twig', array(
            'participants' => $participants,
            'regions' => $regions,
            'districts' => $districts,
            'branche' => $branche
        ));
    }
}
