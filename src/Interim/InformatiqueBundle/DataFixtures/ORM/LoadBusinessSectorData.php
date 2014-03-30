<?php

// src/Interim/InformatiqueBundle/DataFixtures/ORM/LoadBusinessSectorData.php

namespace Interim\InformatiqueBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Interim\InformatiqueBundle\Entity\BusinessSector;

class LoadBusinessSectorData implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $businessSectors = array(
            'Agriculture',
            'Chimie, pharmacie',
            'Énergie',
            'Maintenance, entretien',
            'Armée, sécurité',
            'Commerce, distribution',
            'Enseignement',
            'Mécanique',
            'Art, Design',
            'Communication - Marketing - Pub',
            'Environnement',
            'Mode, industrie textile',
            'Audiovisuel - Spectacle',
            'Construction aéronautique, ferroviaire et navale',
            'Fonction publique',
            'Recherche',
            'Audit, gestion',
            'Culture - Artisanat d\'art',
            'Hôtellerie, restauration',
            'Santé',
            'Automobile',
            'Droit, justice',
            'Industrie alimentaire',
            'Social',
            'Banque, assurance',
            'Edition, Journalisme',
            'Informatique et télécoms',
            'Sport, loisirs – Tourisme',
            'Bois',
            'Électronique',
            'Logistique, transport',
            'Traduction - interprétariat',
            'BTP, architecture',
            'Verre, béton, céramique'
        );

        sort($businessSectors);


        foreach ($businessSectors as $i => $businessSector) {
            $businessSectorsList[$i] = new BusinessSector();
            $businessSectorsList[$i]->setName($businessSector);

            $manager->persist($businessSectorsList[$i]);
        }

        $manager->flush();
    }

}
