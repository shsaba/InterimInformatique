<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Job
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\InformatiqueBundle\Entity\JobRepository")
 */
class Job
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
     * @ORM\Column(name="postName", type="string", length=255)
     */
    private $postName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="profile", type="text")
     */
    private $profile;

    /**
     * @var string
     *
     * @ORM\Column(name="postSheet", type="string", length=255)
     */
    private $postSheet;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipCode", type="integer")
     */
    private $zipCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contractStartDate", type="date")
     */
    private $contractStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contractEndDate", type="date")
     */
    private $contractEndDate;

    /**
     * @ORM\ManyToMany(targetEntity="Interim\InformatiqueBundle\Entity\Skill", cascade={"persist"})
     */
    private $skills;

    /**
     * @ORM\ManyToMany(targetEntity="Interim\InformatiqueBundle\Entity\DiplomaLevel")
     */
    private $diplomaLevels;

    /**
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\Company")
     */
    private $company;

    /**
     * @ORM\ManyToMany(targetEntity="Interim\InformatiqueBundle\Entity\KindContract")
     */
    private $kindContracts;

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
     * Set postName
     *
     * @param string $postName
     * @return Job
     */
    public function setPostName($postName)
    {
        $this->postName = $postName;

        return $this;
    }

    /**
     * Get postName
     *
     * @return string 
     */
    public function getPostName()
    {
        return $this->postName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Job
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
     * Set profile
     *
     * @param string $profile
     * @return Job
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return string 
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set postSheet
     *
     * @param string $postSheet
     * @return Job
     */
    public function setPostSheet($postSheet)
    {
        $this->postSheet = $postSheet;

        return $this;
    }

    /**
     * Get postSheet
     *
     * @return string 
     */
    public function getPostSheet()
    {
        return $this->postSheet;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Job
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Job
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zipCode
     *
     * @param integer $zipCode
     * @return Job
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return integer 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
        $this->diplomaLevels = new \Doctrine\Common\Collections\ArrayCollection();
        $this->kindContracts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set contractStartDate
     *
     * @param \DateTime $contractStartDate
     * @return Job
     */
    public function setContractStartDate($contractStartDate)
    {
        $this->contractStartDate = $contractStartDate;

        return $this;
    }

    /**
     * Get contractStartDate
     *
     * @return \DateTime 
     */
    public function getContractStartDate()
    {
        return $this->contractStartDate;
    }

    /**
     * Set contractEndDate
     *
     * @param \DateTime $contractEndDate
     * @return Job
     */
    public function setContractEndDate($contractEndDate)
    {
        $this->contractEndDate = $contractEndDate;

        return $this;
    }

    /**
     * Get contractEndDate
     *
     * @return \DateTime 
     */
    public function getContractEndDate()
    {
        return $this->contractEndDate;
    }

    /**
     * Add skills
     *
     * @param \Interim\InformatiqueBundle\Entity\Skill $skills
     * @return Job
     */
    public function addSkill(\Interim\InformatiqueBundle\Entity\Skill $skills)
    {
        $this->skills[] = $skills;

        return $this;
    }

    /**
     * Remove skills
     *
     * @param \Interim\InformatiqueBundle\Entity\Skill $skills
     */
    public function removeSkill(\Interim\InformatiqueBundle\Entity\Skill $skills)
    {
        $this->skills->removeElement($skills);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Add diplomaLevels
     *
     * @param \Interim\InformatiqueBundle\Entity\DiplomaLevel $diplomaLevels
     * @return Job
     */
    public function addDiplomaLevel(\Interim\InformatiqueBundle\Entity\DiplomaLevel $diplomaLevels)
    {
        $this->diplomaLevels[] = $diplomaLevels;

        return $this;
    }

    /**
     * Remove diplomaLevels
     *
     * @param \Interim\InformatiqueBundle\Entity\DiplomaLevel $diplomaLevels
     */
    public function removeDiplomaLevel(\Interim\InformatiqueBundle\Entity\DiplomaLevel $diplomaLevels)
    {
        $this->diplomaLevels->removeElement($diplomaLevels);
    }

    /**
     * Get diplomaLevels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiplomaLevels()
    {
        return $this->diplomaLevels;
    }

    /**
     * Set company
     *
     * @param \Interim\InformatiqueBundle\Entity\Company $company
     * @return Job
     */
    public function setCompany(\Interim\InformatiqueBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Interim\InformatiqueBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Add kindContracts
     *
     * @param \Interim\InformatiqueBundle\Entity\KindContract $kindContracts
     * @return Job
     */
    public function addKindContract(\Interim\InformatiqueBundle\Entity\KindContract $kindContracts)
    {
        $this->kindContracts[] = $kindContracts;

        return $this;
    }

    /**
     * Remove kindContracts
     *
     * @param \Interim\InformatiqueBundle\Entity\KindContract $kindContracts
     */
    public function removeKindContract(\Interim\InformatiqueBundle\Entity\KindContract $kindContracts)
    {
        $this->kindContracts->removeElement($kindContracts);
    }

    /**
     * Get kindContracts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getKindContracts()
    {
        return $this->kindContracts;
    }

}
