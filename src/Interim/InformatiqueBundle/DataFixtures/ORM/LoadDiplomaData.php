<?php

// src/Interim/InformatiqueBundle/DataFixtures/ORM/LoadDiplomaData.php

namespace Interim\InformatiqueBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Interim\InformatiqueBundle\Entity\Diploma;

class LoadDiplomaData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {


        $diplomasLevelsV = array(
            'BEP',
            'CAP'
        );

        sort($diplomasLevelsV);
        foreach ($diplomasLevelsV as $i => $diplomaLevel) {
            $diplomasLevelsList[$i] = new Diploma();
            $diplomasLevelsList[$i]->setName($diplomaLevel);
            $diplomasLevelsList[$i]->setDiplomaLevel($this->getReference('1'));

            $manager->persist($diplomasLevelsList[$i]);
        }

        $diplomasLevelsIV = array(
            'Bac général',
            'Bac technologique',
            'Bac professionnel'
        );

        sort($diplomasLevelsIV);
        foreach ($diplomasLevelsIV as $i => $diplomaLevel) {
            $diplomasLevelsList[$i] = new Diploma();
            $diplomasLevelsList[$i]->setName($diplomaLevel);
            $diplomasLevelsList[$i]->setDiplomaLevel($this->getReference('1'));

            $manager->persist($diplomasLevelsList[$i]);
        }

        $diplomasLevelsIII = array(
            'BTS',
            'DUT',
            'DEUST',
            'DU'
        );

        sort($diplomasLevelsIII);
        foreach ($diplomasLevelsIII as $i => $diplomaLevel) {
            $diplomasLevelsList[$i] = new Diploma();
            $diplomasLevelsList[$i]->setName($diplomaLevel);
            $diplomasLevelsList[$i]->setDiplomaLevel($this->getReference('2'));

            $manager->persist($diplomasLevelsList[$i]);
        }

        $diplomasLevelsII = array(
            'Licence professionnelle',
            'Licence'
        );

        sort($diplomasLevelsII);
        foreach ($diplomasLevelsII as $i => $diplomaLevel) {
            $diplomasLevelsList[$i] = new Diploma();
            $diplomasLevelsList[$i]->setName($diplomaLevel);
            $diplomasLevelsList[$i]->setDiplomaLevel($this->getReference('3'));

            $manager->persist($diplomasLevelsList[$i]);
        }

        $diplomasLevelsI = array(
            'Master recherche',
            'Master métiers de l\'enseignement',
            'Diplôme d\'ingénieur',
            'Doctorat',
            'Master professionnel'
        );

        sort($diplomasLevelsI);
        foreach ($diplomasLevelsI as $i => $diplomaLevel) {
            $diplomasLevelsList[$i] = new Diploma();
            $diplomasLevelsList[$i]->setName($diplomaLevel);
            $diplomasLevelsList[$i]->setDiplomaLevel($this->getReference('4'));

            $manager->persist($diplomasLevelsList[$i]);
        }


        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}
