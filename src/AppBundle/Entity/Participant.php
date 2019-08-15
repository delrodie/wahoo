<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 *
 * @ORM\Table(name="participant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParticipantRepository")
 */
class Participant
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenoms", type="string", length=255)
     */
    private $prenoms;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="naissance", type="string", length=255)
     */
    private $naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="cel", type="string", length=255)
     */
    private $cel;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="invisible", type="string", length=255, nullable=true)
     */
    private $invisible;

    /**
     * @var int
     *
     * @ORM\Column(name="flag", type="integer", nullable=true)
     */
    private $flag;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Branche", inversedBy="participants")
     * @ORM\JoinColumn(name="branche_id", referencedColumnName="id")
     */
    private $branche;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Region", inversedBy="participants")
     * @ORM\JoinCOlumn(name="region_id", referencedColumnName="id")
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\District", inversedBy="participants")
     * @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     */
    private $district;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Participant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenoms
     *
     * @param string $prenoms
     *
     * @return Participant
     */
    public function setPrenoms($prenoms)
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    /**
     * Get prenoms
     *
     * @return string
     */
    public function getPrenoms()
    {
        return $this->prenoms;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Participant
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set naissance
     *
     * @param string $naissance
     *
     * @return Participant
     */
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;

        return $this;
    }

    /**
     * Get naissance
     *
     * @return string
     */
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * Set cel
     *
     * @param string $cel
     *
     * @return Participant
     */
    public function setCel($cel)
    {
        $this->cel = $cel;

        return $this;
    }

    /**
     * Get cel
     *
     * @return string
     */
    public function getCel()
    {
        return $this->cel;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Participant
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
     * Set invisible
     *
     * @param string $invisible
     *
     * @return Participant
     */
    public function setInvisible($invisible)
    {
        $this->invisible = $invisible;

        return $this;
    }

    /**
     * Get invisible
     *
     * @return string
     */
    public function getInvisible()
    {
        return $this->invisible;
    }

    /**
     * Set flag
     *
     * @param integer $flag
     *
     * @return Participant
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return int
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set branche
     *
     * @param \AppBundle\Entity\Branche $branche
     *
     * @return Participant
     */
    public function setBranche(\AppBundle\Entity\Branche $branche = null)
    {
        $this->branche = $branche;

        return $this;
    }

    /**
     * Get branche
     *
     * @return \AppBundle\Entity\Branche
     */
    public function getBranche()
    {
        return $this->branche;
    }

    /**
     * Set region
     *
     * @param \AppBundle\Entity\Region $region
     *
     * @return Participant
     */
    public function setRegion(\AppBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \AppBundle\Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set district
     *
     * @param \AppBundle\Entity\District $district
     *
     * @return Participant
     */
    public function setDistrict(\AppBundle\Entity\District $district = null)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return \AppBundle\Entity\District
     */
    public function getDistrict()
    {
        return $this->district;
    }
}
