<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RegionRepository")
 */
class Region
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Participant", mappedBy="region")
     */
    private $participants;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Region
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Region
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add participant
     *
     * @param \AppBundle\Entity\Participant $participant
     *
     * @return Region
     */
    public function addParticipant(\AppBundle\Entity\Participant $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove participant
     *
     * @param \AppBundle\Entity\Participant $participant
     */
    public function removeParticipant(\AppBundle\Entity\Participant $participant)
    {
        $this->participants->removeElement($participant);
    }

    /**
     * Get participants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }
}
