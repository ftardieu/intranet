<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="intranet_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;




    /**
     * @var string
     *
     * @ORM\Column(name="visa", type="string", length=255, nullable = true)
     */
    private $visa;


     /**
     * Set visa
     *
     * @param string $visa
     * @return User
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

}