<?php

// src/Interim/InformatiqueBundle/DataFixtures/ORM/LoadDiplomaLevelData.php

namespace Interim\InformatiqueBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Interim\InformatiqueBundle\Entity\DiplomaLevel;

class LoadDiplomaLevelData implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $diplomasLevels = array(
            'Niveau V',
            'Niveau IV',
            'Niveau III',
            'Niveau II',
            'Niveau I'
        );


        foreach ($diplomasLevels as $i => $diplomaLevel) {
            $diplomasLevelsList[$i] = new DiplomaLevel();
            $diplomasLevelsList[$i]->setName($diplomaLevel);
            $diplomasLevelsList[$i]->setOrder($i);

            $manager->persist($diplomasLevelsList[$i]);
        }

        $manager->flush();
    }

}
