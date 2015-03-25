<?php

namespace HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temoins
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HomeBundle\Entity\TemoinsRepository")
 */
class Temoins
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomTemoin", type="string", length=255)
     */
    private $nomTemoin;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="numLot", type="integer")
     */
    private $numLot;

    /**
     * @var integer
     *
     * @ORM\Column(name="qteActuelle", type="integer")
     */
    private $qteActuelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="qteDepart", type="integer")
     */
    private $qteDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dluo", type="date")
     */
    private $dluo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePeremption", type="date")
     */
    private $datePeremption;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @var float
     *
     * @ORM\Column(name="theorie", type="float")
     */
    private $theorie;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


     /**
     * Set theorie
     *
     * @param float $theorie
     * @return Temoins
     */
    public function setTheorie($theorie)
    {
        $this->theorie = $theorie;

        return $this;
    }

    /**
     * Get theorie
     *
     * @return float 
     */
    public function getTheorie()
    {
        return $this->theorie;
    }

    /**
     * Set nomTemoin
     *
     * @param string $nomTemoin
     * @return Temoins
     */
    public function setNomTemoin($nomTemoin)
    {
        $this->nomTemoin = $nomTemoin;

        return $this;
    }

    /**
     * Get nomTemoin
     *
     * @return string 
     */
    public function getNomTemoin()
    {
        return $this->nomTemoin;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Temoins
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set numLot
     *
     * @param integer $numLot
     * @return Temoins
     */
    public function setNumLot($numLot)
    {
        $this->numLot = $numLot;

        return $this;
    }

    /**
     * Get numLot
     *
     * @return integer 
     */
    public function getNumLot()
    {
        return $this->numLot;
    }

    /**
     * Set qteActuelle
     *
     * @param integer $qteActuelle
     * @return Temoins
     */
    public function setQteActuelle($qteActuelle)
    {
        $this->qteActuelle = $qteActuelle;

        return $this;
    }

    /**
     * Get qteActuelle
     *
     * @return integer 
     */
    public function getQteActuelle()
    {
        return $this->qteActuelle;
    }

    /**
     * Set qteDepart
     *
     * @param integer $qteDepart
     * @return Temoins
     */
    public function setQteDepart($qteDepart)
    {
        $this->qteDepart = $qteDepart;

        return $this;
    }

    /**
     * Get qteDepart
     *
     * @return integer 
     */
    public function getQteDepart()
    {
        return $this->qteDepart;
    }

    /**
     * Set dluo
     *
     * @param \DateTime $dluo
     * @return Temoins
     */
    public function setDluo($dluo)
    {
        $this->dluo = $dluo;

        return $this;
    }

    /**
     * Get dluo
     *
     * @return \DateTime 
     */
    public function getDluo()
    {
        return $this->dluo;
    }

    /**
     * Set datePeremption
     *
     * @param \DateTime $datePeremption
     * @return Temoins
     */
    public function setDatePeremption($datePeremption)
    {
        $this->datePeremption = $datePeremption;

        return $this;
    }

    /**
     * Get datePeremption
     *
     * @return \DateTime 
     */
    public function getDatePeremption()
    {
        return $this->datePeremption;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     * @return Temoins
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean 
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
