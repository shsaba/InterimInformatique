<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Interim\EmployeeBundle\Entity\Employee;
use Interim\InformatiqueBundle\Entity\Diploma;
use Interim\InformatiqueBundle\Entity\Skill;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * JobSeeker
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\InformatiqueBundle\Entity\JobSeekerRepository")
 * @ORM\HasLifecycleCallbacks
 */
class JobSeeker
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
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Length(
     *      min = "3",
     *      minMessage = "Le nom du contact doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     * @Assert\Length(
     *      min = "3",
     *      minMessage = "Le prénom du contact doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, unique=true)
     * @Assert\Email(
     *     message = "'{{ value }}' n'est pas un email valide.",
     *     checkMX = true
     * )
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text")
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
     *      min = "3",
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
     * @ORM\Column(name="dateOfBirth", type="date")
     * @Assert\Date()
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255)
     */
    private $cv;
    private $file;
    private $tempFilename;


    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=255)
     * @Assert\Length(
     *      min = "10",
     *      max = "10",
     *      exactMessage = "Le numéro de téléphone doit comporter {{ limit }} chiffres"
     * )
     */
    private $phoneNumber;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean")
     * @Assert\NotNull()
     */
    private $available;

    /**
     * @ORM\ManyToOne(targetEntity="Interim\EmployeeBundle\Entity\Employee")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull()
     */
    private $employee;

    /**
     * @ORM\ManyToMany(targetEntity="Interim\InformatiqueBundle\Entity\Diploma", cascade={"persist"})
     * @Assert\NotNull()
     */
    private $diplomas;

    /**
     * @ORM\ManyToMany(targetEntity="Interim\InformatiqueBundle\Entity\Skill", cascade={"persist"})
     * @Assert\NotNull()
     */
    private $skills;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return JobSeeker
     */
    public function setName($name) {
        $this->name = strtoupper($name);

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return JobSeeker
     */
    public function setSurname($surname) {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return JobSeeker
     */
    public function setMail($mail) {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail() {
        return $this->mail;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return JobSeeker
     */
    public function setAddress($address) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return JobSeeker
     */
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return JobSeeker
     */
    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode() {
        return $this->zipCode;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return JobSeeker
     */
    public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    /**
     * Set cv
     *
     * @param string $cv
     * @return JobSeeker
     */
    public function setCv($cv) {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string 
     */
    public function getCv() {
        $fileName = str_replace(' ', '', $this->id . '.' . $this->name . '.' . $this->cv);
        return $this->getUploadDir() . $fileName;
        //return $this->cv;
    }


    /**
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     * @return JobSeeker
     */
    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return integer 
     */
    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    /**
     * Set available
     *
     * @param boolean $available
     * @return JobSeeker
     */
    public function setAvailable($available) {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean 
     */
    public function getAvailable() {
        return $this->available;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->diplomas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set employee
     *
     * @param \Interim\EmployeeBundle\Entity\Employee $employee
     * @return JobSeeker
     */
    public function setEmployee(Employee $employee) {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \Interim\EmployeeBundle\Entity\Employee 
     */
    public function getEmployee() {
        return $this->employee;
    }

    /**
     * Add diplomas
     *
     * @param \Interim\InformatiqueBundle\Entity\Diploma $diplomas
     * @return JobSeeker
     */
    public function addDiploma(Diploma $diplomas) {
        $this->diplomas[] = $diplomas;

        return $this;
    }

    /**
     * Remove diplomas
     *
     * @param \Interim\InformatiqueBundle\Entity\Diploma $diplomas
     */
    public function removeDiploma(Diploma $diplomas) {
        $this->diplomas->removeElement($diplomas);
    }

    /**
     * Get diplomas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiplomas() {
        return $this->diplomas;
    }

    /**
     * Add skills
     *
     * @param \Interim\InformatiqueBundle\Entity\Skill $skills
     * @return JobSeeker
     */
    public function addSkill(Skill $skills) {
        $this->skills[] = $skills;

        return $this;
    }

    /**
     * Remove skills
     *
     * @param \Interim\InformatiqueBundle\Entity\Skill $skills
     */
    public function removeSkill(Skill $skills) {
        $this->skills->removeElement($skills);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSkills() {
        return $this->skills;
    }

    public function setFile(UploadedFile $file) {
        $this->file = $file;

        if (null !== $this->cv) {
            $this->tempFilename = $this->id . '.' . $this->name . '.' . $this->cv;
            $this->cv = null;
        }
    }

    public function getFile() {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null === $this->file) {
            return;
        }
        $this->cv = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        if (null === $this->file) {
            return;
        }

        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir() . '/' . $this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $fileName = str_replace(' ', '', $this->id . '.' . $this->name . '.' . $this->cv);
        $this->file->move(
                $this->getUploadRootDir(), $fileName
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->name . '.' . $this->cv;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if (file_exists($this->tempFilename)) {
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir() {
        return 'uploads/cvs/';
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    public function getWebPath() {
        return $this->getUploadRootDir() . $this->cv;
    }

}
