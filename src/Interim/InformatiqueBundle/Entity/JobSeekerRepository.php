<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Interim\InformatiqueBundle\Entity\JobSeeker;

/**
 * JobSeekerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JobSeekerRepository extends EntityRepository
{

    public function getJobSeekersWithEmployee() {

        $qb = $this->createQueryBuilder('js')
                ->leftJoin('js.employee', 'e')
                ->addSelect('e')
                ->orderBy('js.name', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function getJobSeekersInfos($id) {

        $qb = $this->createQueryBuilder('js')
                ->leftJoin('js.employee', 'e')
                ->addSelect('e')
                ->leftJoin('js.diplomas', 'd')
                ->addSelect('d')
                ->leftJoin('js.skills', 's')
                ->addSelect('s');

        $qb->where('js.id = :id')
                ->setParameter('id', $id);


        return $qb->getQuery()->getSingleResult();
    }

}
