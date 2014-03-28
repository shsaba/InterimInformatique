<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Company
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\InformatiqueBundle\Entity\CompanyRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Company
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
     */
    private $name;

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
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;
    private $file;
    private $tempFilename;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="contactName", type="string", length=255)
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="contactSurname", type="string", length=255)
     */
    private $contactSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="contactMail", type="string", length=255)
     */
    private $contactMail;

    /**
     * @var string
     *
     * @ORM\Column(name="idNumber", type="string", length=255)
     */
    private $idNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\BusinessSector")
     */
    private $businessSector;

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
     * @return Company
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
     * Set address
     *
     * @param string $address
     * @return Company
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
     * @return Company
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
     * @param integer $zipCode
     * @return Company
     */
    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return integer 
     */
    public function getZipCode() {
        return $this->zipCode;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Company
     */
    public function setLogo($logo) {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo() {
        return $this->getUploadDir() . $this->id . '.' . $this->logo;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Company
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     * @return Company
     */
    public function setContactName($contactName) {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string 
     */
    public function getContactName() {
        return $this->contactName;
    }

    /**
     * Set contactSurname
     *
     * @param string $contactSurname
     * @return Company
     */
    public function setContactSurname($contactSurname) {
        $this->contactSurname = $contactSurname;

        return $this;
    }

    /**
     * Get contactSurname
     *
     * @return string 
     */
    public function getContactSurname() {
        return $this->contactSurname;
    }

    /**
     * Set contactMail
     *
     * @param string $contactMail
     * @return Company
     */
    public function setContactMail($contactMail) {
        $this->contactMail = $contactMail;

        return $this;
    }

    /**
     * Get contactMail
     *
     * @return string 
     */
    public function getContactMail() {
        return $this->contactMail;
    }

    /**
     * Set idNumber
     *
     * @param string $idNumber
     * @return Company
     */
    public function setIdNumber($idNumber) {
        $this->idNumber = $idNumber;

        return $this;
    }

    /**
     * Get idNumber
     *
     * @return string 
     */
    public function getIdNumber() {
        return $this->idNumber;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Company
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set businessSector
     *
     * @param \Interim\InformatiqueBundle\Entity\BusinessSector $businessSector
     * @return Company
     */
    public function setBusinessSector(\Interim\InformatiqueBundle\Entity\BusinessSector $businessSector = null) {
        $this->businessSector = $businessSector;

        return $this;
    }

    /**
     * Get businessSector
     *
     * @return \Interim\InformatiqueBundle\Entity\BusinessSector 
     */
    public function getBusinessSector() {
        return $this->businessSector;
    }

    public function setFile(UploadedFile $file) {
        $this->file = $file;

        if (null !== $this->logo) {
            $$this->tempFilename = $this->logo;
            $this->logo = null;
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

        $this->logo = $this->file->getClientOriginalName();
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

        $this->file->move(
                $this->getUploadRootDir(), $this->id . '.' . $this->logo
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->logo;
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
        return 'uploads/logos/';
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

}
