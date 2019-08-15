<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Participant;
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
     * Finds and displays a participant entity.
     *
     * @Route("/{id}", name="participant_show")
     * @Method("GET")
     */
    public function showAction(Participant $participant)
    {

        return $this->render('participant/show.html.twig', array(
            'participant' => $participant,
        ));
    }
}
