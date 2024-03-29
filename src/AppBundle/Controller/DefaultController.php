<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/mot-de-bienvenue", name="mot_bienvenue")
     */
    public function bienvenueAction()
    {
        return $this->render('default/bienvenue.html.twig');
    }



    /**
     * @Route("/region", name="region")
     */
    public function regionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $regions = $em->getRepository("AppBundle:Region")->findRegion();
        return $this->render("default/region_liste.html.twig",[
            'regions' => $regions,
        ]);
    }

    /**
     * @Route("/branche", name="branche")
     */
    public function brancheAction()
    {
        $em = $this->getDoctrine()->getManager();
        $branches = $em->getRepository("AppBundle:Branche")->findAll();
        return $this->render("default/branche_liste.html.twig",[
            'branches' => $branches,
        ]);
    }

}
