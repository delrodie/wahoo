<?php

namespace AppBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class ProgrammeController
 * @Route("/programme")
 */
class ProgrammeController extends Controller
{
    /**
     * Liste des programmes
     *
     * @Route("/", name="frontend_programme")
     */
    public function indexAction()
    {
        return $this->render('default/programme.html.twig');
    }

    /**
     * Programme du jour
     *
     * @Route("/{jour}", name="frontend_programme_jour")
     * @Method("GET")
     */
    public function jourAction($jour)
    {
        if ($jour == 12){
            return $this->render('default/12.html.twig');
        }elseif ($jour == 14){
            return $this->render('default/14.html.twig');
        }elseif ($jour == 15){
            return $this->render('default/15.html.twig');
        }elseif ($jour == 16){
            return $this->render('default/16.html.twig');
        }else{
            return $this->render('default/programme.html.twig');
        }
    }
}
