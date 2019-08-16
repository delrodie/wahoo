<?php


namespace AppBundle\Utilities;


use Doctrine\ORM\EntityManager;

class GestionParticipant
{
    public function __construct(EntityManager $manager)
    {
        $this->em = $manager;
    }

    /**
     * Generation de code pour participant
     */
    public function codification($debut,$fin)
    {
        for ($i=$debut; $i<= $fin; $i++){
            $participant = $this->em->getRepository("AppBundle:Participant")->findOneBy(['id'=>$i]);
            $id = $participant->getId();
            if ($id < 10) $num = '0000'.$id;
            elseif ($id < 100) $num = '000'.$id;
            elseif ($id < 1000) $num = '00'.$id;
            elseif ($id < 10000) $num = '0'.$id;
            else $num = $id;
            //affectation des regions
            $code = $participant->getRegion()->getCode().'-'.$num;
            $participant->setCode($code);
            $this->em->flush();
        }
        return true;
    }

    /**
     * liste des participants
     */
    public function branche($branche)
    {
        $compteur = $this->em->getRepository("AppBundle:Participant")->compteur($branche); //dump($compteur);die();
        $participants = $this->em->getRepository("AppBundle:Participant")->listID($branche);

        /*$aleatoire = rand(0,1670);
        $participant = $this->em->getRepository("AppBundle:Participant")->findOneBy(['id'=>1, 'flag'=>null]);
        $invisible = $this->em->getRepository("AppBundle:Participant")->findOneBy(['id'=>$aleatoire, 'flag'=>null]);

        dump($invisible);die();*/
        foreach ($participants as $key => $value)
        {
            $aleatoire = rand($key,10817);
            $participant = $this->em->getRepository("AppBundle:Participant")->findOneBy(['id'=>$value, 'flag'=>null]);
            $invisible = $this->em->getRepository("AppBundle:Participant")->findOneBy(['id'=>$aleatoire, 'branche'=>$branche, 'flag'=>null]);
            if ($participant){
                if ($invisible){
                    $participant->setInvisible($invisible->getCode());
                    $participant->setFlag(1);
                    $this->em->flush();
                    $invisible->setInvisible($participant->getCode());
                    $invisible->setFlag(1); //dump($invisible);die();

                    $this->em->flush();
                    //return true;
                }
            }
        }
        return true;
    }
}
