<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Participant;
use AppBundle\Utilities\GestionParticipant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Participant controller.
 *
 * @Route("participant")
 */
class ParticipantController extends Controller
{
    /**
     * Lists all participant entities.
     *
     * @Route("/", name="participant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $participants = $em->getRepository('AppBundle:Participant')->findAll();

        return $this->render('participant/index.html.twig', array(
            'participants' => $participants,
        ));
    }

    /**
     * @Route("/{branche}", name="participant_branche")
     * @Method("GET")
     */
    public function cpteurAction($branche, GestionParticipant $gestionParticipant)
    {
        $em = $this->getDoctrine()->getManager();
        //$nombre = $em->getRepository("AppBundle:Participant")->compteur($branche);
        $gestionParticipant->branche($branche);
        //dump($gestionParticipant);die();

        $participants = $em->getRepository('AppBundle:Participant')->findListBranche($branche);

        return $this->render('participant/index.html.twig', array(
            'participants' => $participants,
        ));
    }

    /**
     * Finds and displays a participant entity.
     *
     * @Route("/codification/{debut}-{fin}", name="participant_show")
     * @Method("GET")
     */
    public function shwAction(GestionParticipant $gestionParticipant, $debut, $fin)
    {
        $gestionParticipant->codification($debut,$fin);
        $em = $this->getDoctrine()->getManager();

        $participants = $em->getRepository('AppBundle:Participant')->findAll();

        return $this->render('participant/index.html.twig', array(
            'participants' => $participants,
        ));
    }
}
