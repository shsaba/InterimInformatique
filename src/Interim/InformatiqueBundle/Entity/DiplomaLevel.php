<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * DiplomaLevel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\InformatiqueBundle\Entity\DiplomaLevelRepository")
 * @UniqueEntity(fields="name", message="Un niveau d'études existe déjà avec ce nom.")
 */
class DiplomaLevel
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="orderLevel", type="integer")
     */
    private $orderLevel;

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
     * Set name
     *
     * @param string $name
     * @return DiplomaLevel
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set orderLevel
     *
     * @param integer $orderLevel
     * @return DiplomaLevel
     */
    public function setOrderLevel($orderLevel)
    {
        $this->orderLevel = $orderLevel;

        return $this;
    }

    /**
     * Get orderLevel
     *
     * @return integer 
     */
    public function getOrderLevel()
    {
        return $this->orderLevel;
    }
}
