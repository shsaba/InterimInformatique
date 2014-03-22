<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class MeetingEmployeeJobSeeker
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\Employee")
     */
    private $employee;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\JobSeeker")
     */
    private $jobSeeker;

    /**
     * @var date
     * @ORM\Id
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var note
     * @ORM\Column(name="notes", type="text")
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
     * @param \Interim\InformatiqueBundle\Entity\Employee $employee
     * @return MeetingEmployeeJobSeeker
     */
    public function setEmployee(\Interim\InformatiqueBundle\Entity\Employee $employee)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \Interim\InformatiqueBundle\Entity\Employee 
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
