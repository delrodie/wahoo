<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Region;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Region controller.
 *
 * @Route("region")
 */
class RegionController extends Controller
{
    /**
     * Lists all region entities.
     *
     * @Route("/", name="region_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $regionID = $request->get('region');
        $brancheID = $request->get('branche');

        $regions = $em->getRepository('AppBundle:Region')->findAll();
        $districts = $em->getRepository("AppBundle:District")->findBy(['region'=>$regionID], ['libelle'=>'ASC']);
        $participants = $em->getRepository("AppBundle:Participant")->findBy(['region'=>$regionID, 'branche'=>$brancheID], ['nom'=>'ASC', 'prenoms'=>'ASC']);

        return $this->render('region/index.html.twig', array(
            'regions' => $regions,
            'districts' => $districts,
            'participants' => $participants,
            'branche' => $brancheID,
        ));
    }

    /**
     * Liste des regions
     *
     * @Route("/liste", name="region_liste")
     */
    public function listeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $regions = $em->getRepository("AppBundle:Region")->findAll();
        return $this->render("region/liste.html.twig",[
            'regions' => $regions,
        ]);
    }

    /**
     * Finds and displays a region entity.
     *
     * @Route("/{id}", name="region_show")
     * @Method("GET")
     */
    public function showAction(Region $region)
    {
        $em = $this->getDoctrine()->getManager();
        $participants = $em->getRepository("AppBundle:Participant")->findBy(['region'=>$region->getId()]);
        $districts = $em->getRepository("AppBundle:District")->findBy(['region'=>$region->getId()], ['libelle'=>'ASC']);
        $branches = $em->getRepository('AppBundle:Branche')->findAll();

        return $this->render('region/show.html.twig', array(
            'region' => $region,
            'participants' => $participants,
        ));
    }
}
