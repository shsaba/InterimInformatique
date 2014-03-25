<?php

namespace Interim\InformatiqueBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CompanyRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CompanyRepository extends EntityRepository
{

    public function getCompaniesWithBusinessSector() {
        $qb = $this->createQueryBuilder('c')
                ->leftJoin('c.businessSector', 'b')
                ->addSelect('b')
                ->orderBy('c.name', 'ASC');

        return $qb->getQuery()->getResult();
    }

}
