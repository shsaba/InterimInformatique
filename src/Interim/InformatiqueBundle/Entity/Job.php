<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Interim\InformatiqueBundle\Entity\Skill;
use Interim\InformatiqueBundle\Entity\DiplomaLevel;
use Interim\InformatiqueBundle\Entity\Company;
use Interim\InformatiqueBundle\Entity\KindContract;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Job
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\InformatiqueBundle\Entity\JobRepository")
 * @ORM\HasLifecycleCallbacks
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
     * @Assert\Length(
     *      min = "10",
     *      minMessage = "Le nom du poste doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $postName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\Length(
     *      min = "50",
     *      minMessage = "La description doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="profile", type="text")
     * @Assert\Length(
     *      min = "50",
     *      minMessage = "La description du profil doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $profile;

    /**
     * @var string
     *
     * @ORM\Column(name="postSheet", type="string", length=255)
     */
    private $postSheet;
    private $file;
    private $tempFilename;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\Length(
     *      min = "10",
     *      minMessage = "L'adresse doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\Length(
     *      min = "5",
     *      minMessage = "La ville doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipCode", type="integer")
     * @Assert\Length(
     *      min = "3",
     *      minMessage = "Le code postal doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $zipCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contractStartDate", type="date")
     * @Assert\Date()
     */
    private $contractStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contractEndDate", type="date")
     * @Assert\Date()
     */
    private $contractEndDate;

    /**
     * @ORM\ManyToMany(targetEntity="Interim\InformatiqueBundle\Entity\Skill", cascade={"persist"})
     * @Assert\NotNull()
     */
    private $skills;

    /**
     * @ORM\ManyToMany(targetEntity="Interim\InformatiqueBundle\Entity\DiplomaLevel")
     * @Assert\NotNull()
     */
    private $diplomaLevels;

    /**
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\Company")
     * @Assert\NotNull()
     */
    private $company;

    /**
     * @ORM\ManyToMany(targetEntity="Interim\InformatiqueBundle\Entity\KindContract")
     * @Assert\NotNull()
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
        $fileName = str_replace(' ', '', $this->id . '.' . $this->postSheet);
        return $this->getUploadDir() . $fileName;
        //return $this->postSheet;
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
    public function addSkill(Skill $skills)
    {
        $this->skills[] = $skills;

        return $this;
    }

    /**
     * Remove skills
     *
     * @param \Interim\InformatiqueBundle\Entity\Skill $skills
     */
    public function removeSkill(Skill $skills)
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
    public function addDiplomaLevel(DiplomaLevel $diplomaLevels)
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
    public function setCompany(Company $company = null)
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
    public function addKindContract(KindContract $kindContracts)
    {
        $this->kindContracts[] = $kindContracts;

        return $this;
    }

    /**
     * Remove kindContracts
     *
     * @param \Interim\InformatiqueBundle\Entity\KindContract $kindContracts
     */
    public function removeKindContract(KindContract $kindContracts)
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

    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        if (null !== $this->cv) {
            $this->tempFilename = $this->postSheet;
            $this->postSheet = null;
        }
    }

    public function getFile()
    {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null === $this->file) {
            return;
        }
        $this->postSheet = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir() . '/' . $this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $fileName = str_replace(' ', '', $this->id . '.' . $this->postSheet);
        $this->file->move(
                $this->getUploadRootDir(), $fileName
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->postSheet;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (file_exists($this->tempFilename)) {
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir()
    {
        return 'uploads/jobs/';
    }

    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    public function getWebPath()
    {
        return $this->getUploadRootDir() . $this->postSheet;
    }

}
