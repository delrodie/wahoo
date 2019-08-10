<?php

namespace AppBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class JournalController
 * @Route("/journal")
 */
class JournalController extends Controller
{
    /**
     * @Route("/", name="frontend_journal_index")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $journal = $em->getRepository("AppBundle:Journal")->findActiviteEncours();
        return $this->render('default/journal.html.twig',[
            'activites' => $journal,
        ]);
    }
}
