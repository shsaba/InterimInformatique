<?php

// src/Interim/InformatiqueBundle/DataFixtures/ORM/LoadDiplomaLevelData.php

namespace Interim\InformatiqueBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Interim\InformatiqueBundle\Entity\DiplomaLevel;

class LoadDiplomaLevelData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
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
            $diplomasLevelsList[$i]->setOrderLevel($i);

            $manager->persist($diplomasLevelsList[$i]);
            $this->addReference($i, $diplomasLevelsList[$i]);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }

}
