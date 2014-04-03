<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Diploma
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\InformatiqueBundle\Entity\DiplomaRepository")
 * @UniqueEntity(fields="name", message="Un diplôme existe déjà avec ce nom.")
 */
class Diploma
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\Length(
     *      min = "2",
     *      minMessage = "Le nom du diplôme doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\DiplomaLevel", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false) 
     * @Assert\NotNull()
     */
    private $diplomaLevel;

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
     * @return Diploma
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
     * Set diplomaLevel
     *
     * @param \Interim\InformatiqueBundle\Entity\DiplomaLevel $diplomaLevel
     * @return Diploma
     */
    public function setDiplomaLevel(\Interim\InformatiqueBundle\Entity\DiplomaLevel $diplomaLevel)
    {
        $this->diplomaLevel = $diplomaLevel;

        return $this;
    }

    /**
     * Get diplomaLevel
     *
     * @return \Interim\InformatiqueBundle\Entity\DiplomaLevel 
     */
    public function getDiplomaLevel()
    {
        return $this->diplomaLevel;
    }
}
