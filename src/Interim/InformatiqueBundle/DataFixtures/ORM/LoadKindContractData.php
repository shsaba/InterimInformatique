<?php

// src/Interim/InformatiqueBundle/DataFixtures/ORM/LoadKindContractData.php

namespace Interim\InformatiqueBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Interim\InformatiqueBundle\Entity\KindContract;

class LoadKindContractData implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $kindContracts = array(
            'CDI',
            'CDD',
            'CTT',
            'Contrat de professionnalisation',
            'Contrat d’apprentissage',
            'Intérim',
            'Contrat de travail à temps partiel',
            'Contrat de travail intermittent',
        );

        sort($kindContracts);


        foreach ($kindContracts as $i => $kindContract) {
            $kindContractsList[$i] = new KindContract();
            $kindContractsList[$i]->setName($kindContract);

            $manager->persist($kindContractsList[$i]);
        }

        $manager->flush();
    }

}
