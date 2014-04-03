<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class MeetingEmployeeJobSeeker
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Interim\EmployeeBundle\Entity\Employee")
     * @Assert\NotNull()
     */
    private $employee;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\JobSeeker")
     * @Assert\NotNull()
     */
    private $jobSeeker;

    /**
     * @var date
     * @ORM\Id
     * @ORM\Column(name="date", type="datetime")
     * @Assert\Date()
     */
    private $date;

    /**
     * @var note
     * @ORM\Column(name="notes", type="text")
     * @Assert\Length(
     *      min = "10",
     *      minMessage = "La note doit avoir {{ limit }} caractères au minimum."
     * )
     */
    private $note;


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return MeetingEmployeeJobSeeker
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
     * Set note
     *
     * @param string $note
     * @return MeetingEmployeeJobSeeker
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set employee
     *
     * @param \Interim\EmployeeBundle\Entity\Employee $employee
     * @return MeetingEmployeeJobSeeker
     */
    public function setEmployee(\Interim\EmployeeBundle\Entity\Employee $employee)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \Interim\EmployeeBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Set jobSeeker
     *
     * @param \Interim\InformatiqueBundle\Entity\JobSeeker $jobSeeker
     * @return MeetingEmployeeJobSeeker
     */
    public function setJobSeeker(\Interim\InformatiqueBundle\Entity\JobSeeker $jobSeeker)
    {
        $this->jobSeeker = $jobSeeker;

        return $this;
    }

    /**
     * Get jobSeeker
     *
     * @return \Interim\InformatiqueBundle\Entity\JobSeeker 
     */
    public function getJobSeeker()
    {
        return $this->jobSeeker;
    }
}
