<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class JobContract
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\JobSeeker")
     */
    private $jobSeeker;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\Job")
     */
    private $job;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Interim\InformatiqueBundle\Entity\KindContract")
     */
    private $kindContract;


    /**
     * Set jobSeeker
     *
     * @param \Interim\InformatiqueBundle\Entity\JobSeeker $jobSeeker
     * @return JobContract
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

    /**
     * Set job
     *
     * @param \Interim\InformatiqueBundle\Entity\Job $job
     * @return JobContract
     */
    public function setJob(\Interim\InformatiqueBundle\Entity\Job $job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return \Interim\InformatiqueBundle\Entity\Job 
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set kindContract
     *
     * @param \Interim\InformatiqueBundle\Entity\KindContract $kindContract
     * @return JobContract
     */
    public function setKindContract(\Interim\InformatiqueBundle\Entity\KindContract $kindContract)
    {
        $this->kindContract = $kindContract;

        return $this;
    }

    /**
     * Get kindContract
     *
     * @return \Interim\InformatiqueBundle\Entity\KindContract 
     */
    public function getKindContract()
    {
        return $this->kindContract;
    }
}
