<?php

namespace HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Analyses
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HomeBundle\Entity\AnalysesRepository")
 */
class Analyses
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbreOnglets", type="integer" ,nullable=true)
     */
    private $nbreOnglets;


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
     * Set libelle
     *
     * @param string $libelle
     * @return Analyses
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
     * Set nbreOnglets
     *
     * @param integer $nbreOnglets
     * @return Analyses
     */
    public function setNbreOnglets($nbreOnglets)
    {
        $this->nbreOnglets = $nbreOnglets;

        return $this;
    }

    /**
     * Get nbreOnglets
     *
     * @return integer 
     */
    public function getNbreOnglets()
    {
        return $this->nbreOnglets;
    }
}
