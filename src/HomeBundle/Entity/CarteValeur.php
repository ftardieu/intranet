<?php

namespace HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarteValeur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HomeBundle\Entity\CarteValeurRepository")
 */
class CarteValeur
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="num", type="integer")
     */
    private $num;

    /**
     * @var float
     *
     * @ORM\Column(name="d1", type="float")
     */
    private $d1;

    /**
     * @var float
     *
     * @ORM\Column(name="d2", type="float")
     */
    private $d2;

    /**
     * @var float
     *
     * @ORM\Column(name="moyenne", type="float")
     */
    private $moyenne;

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255)
     */
    private $cv;

    /**
     * @var string
     *
     * @ORM\Column(name="visa", type="string", length=255)
     */
    private $visa;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * @var boolean
     *
     * @ORM\Column(name="suppression", type="boolean", nullable=true)
     */
    private $suppression;

    /**
     * @var boolean
     *
     * @ORM\Column(name="suppressionVisuel", type="boolean", nullable=true)
     */
    private $SuppressionVisuel;


    /**
     * @var integer
     *
     * @ORM\Column(name="nombreCible", type="integer")
     */
    private $nombreCible;






    /**
     * @ORM\ManyToOne(targetEntity="HomeBundle\Entity\Cartes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carte;



    /**
     * Set carte
     *
     * @param integer $carte
     * @return Cartes
     */
    public function setCarte($carte)
    {
        $this->carte = $carte;

        return $this;
    }

    /**
     * Get carte
     *
     * @return integer 
     */
    public function getCarte()
    {
        return $this->carte;
    }



    /**
     * Set nombreCible
     *
     * @param integer $nombreCible
     * @return CarteValeur
     */
    public function setNombreCible($nombreCible)
    {
        $this->nombreCible = $nombreCible;

        return $this;
    }

    /**
     * Get nombreCible
     *
     * @return integer 
     */
    public function getNombreCible()
    {
        return $this->nombreCible;
    }




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
     * Set nom
     *
     * @param string $nom
     * @return CarteValeur
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
     * Set date
     *
     * @param \DateTime $date
     * @return CarteValeur
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set num
     *
     * @param integer $num
     * @return CarteValeur
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return integer 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set d1
     *
     * @param float $d1
     * @return CarteValeur
     */
    public function setD1($d1)
    {
        $this->d1 = $d1;

        return $this;
    }

    /**
     * Get d1
     *
     * @return float 
     */
    public function getD1()
    {
        return $this->d1;
    }

    /**
     * Set d2
     *
     * @param float $d2
     * @return CarteValeur
     */
    public function setD2($d2)
    {
        $this->d2 = $d2;

        return $this;
    }

    /**
     * Get d2
     *
     * @return float 
     */
    public function getD2()
    {
        return $this->d2;
    }

    /**
     * Set moyenne
     *
     * @param float $moyenne
     * @return CarteValeur
     */
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    /**
     * Get moyenne
     *
     * @return float 
     */
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * Set cv
     *
     * @param string $cv
     * @return CarteValeur
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string 
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set visa
     *
     * @param string $visa
     * @return CarteValeur
     */
    public function setVisa($visa)
    {
        $this->visa = $visa;

        return $this;
    }

    /**
     * Get visa
     *
     * @return string 
     */
    public function getVisa()
    {
        return $this->visa;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return CarteValeur
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
     * Set suppression
     *
     * @param boolean $suppression
     * @return CarteValeur
     */
    public function setSuppression($suppression)
    {
        $this->suppression = $suppression;

        return $this;
    }

    /**
     * Get suppression
     *
     * @return boolean 
     */
    public function getSuppression()
    {
        return $this->suppression;
    }

        /**
     * Set SuppressionVisuel
     *
     * @param boolean $SuppressionVisuel
     * @return CarteValeur
     */
    public function setSuppressionVisuel($SuppressionVisuel)
    {
        $this->SuppressionVisuel = $SuppressionVisuel;

        return $this;
    }

    /**
     * Get SuppressionVisuel
     *
     * @return boolean 
     */
    public function getSuppressionVisuel()
    {
        return $this->SuppressionVisuel;
    }


    function Moyenne() 
    {  
        $Nombres = func_get_args();  
        $Nb = sizeof($Nombres); 
        $Somme = 0;  
        foreach ($Nombres as $Valeur) 
        {  
            $Somme += $Valeur;  
        }  
        return ($Somme / $Nb);  
    }  

   /* function stats_standard_deviation(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
            trigger_error("Pas d'élement dans le tableau", E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error("Un seul élément dans le tableau", E_USER_WARNING);
            return false;
        }

        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
           --$n;
        }
        return sqrt($carry / $n);
    }*/

    

    function stats_standard_deviation($aValues, $bSample = false)
    {
        $fMean = array_sum($aValues) / count($aValues);
        $fVariance = 0.0;
        foreach ($aValues as $i)
        {
            $fVariance += pow($i - $fMean, 2);
        }
        $fVariance /= ( $bSample ? count($aValues) - 1 : count($aValues) );
        return (float) sqrt($fVariance);
    }
}
