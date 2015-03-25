<?php

namespace HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HomeBundle\Entity\CartesRepository")
 */
class Cartes
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
     * @ORM\Column(name="commentaire", type="string", length=255 , nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="HomeBundle\Entity\Analyses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $analyse;

    /**
     * @ORM\ManyToOne(targetEntity="HomeBundle\Entity\Temoins")
     * @ORM\JoinColumn(nullable=false)
     */
    private $temoin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cloturer", type="boolean" , options={"default" = false})
     */
    private $cloturer;

    /**
     * @var float
     *
     * @ORM\Column(name="ecart", type="float")
     */
    private $ecart;





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
     * Set ecart
     *
     * @param float $ecart
     * @return Cartes
     */
    public function setEcart($ecart)
    {
        $this->ecart = $ecart;

        return $this;
    }

    /**
     * Get ecart
     *
     * @return float 
     */
    public function getEcart()
    {
        return $this->ecart;
    }



    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Cartes
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Get temoin_nom
     *
     * @return string 
     */
    public function getNomTemoin()
    {
        return $this->temoin;
    }

       /**
     * Set temoin
     *
     * @param string $temoin
     * @return Temoins
     */
    public function setNomTemoin($temoin)
    {
        $this->temoin = $temoin;
    
        return $this;
    }
    /**
     * Get Analyse_nom
     *
     * @return string 
     */
    public function getNomAnalyse()
    {
        return $this->analyse;
    }

       /**
     * Set Analyse
     *
     * @param string $Analyse
     * @return Analyses
     */
    public function setNomAnalyse($analyse)
    {
        $this->analyse = $analyse;
    
        return $this;
    }


    public function toArray()
    {
    
        return array(
            'id' => $this->getId(),
            'commentaire' => $this->getCommentaire(),
            'analyse' => $this->getNomAnalyse(),
            'temoin' => $this->getNomTemoin(),
            'cloturer' => $this->getCloturer()
        );
    }

    /**
     * Set cloturer
     *
     * @param boolean $cloturer
     * @return Cartes
     */
    public function setCloturer($cloturer)
    {
        $this->cloturer = $cloturer;

        return $this;
    }

    /**
     * Get cloturer
     *
     * @return boolean 
     */
    public function getCloturer()
    {
        return $this->cloturer;
    }
}   
