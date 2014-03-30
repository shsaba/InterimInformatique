<?php

// src/Interim/InformatiqueBundle/DataFixtures/ORM/LoadSkillData.php

namespace Interim\InformatiqueBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Interim\InformatiqueBundle\Entity\Skill;

class LoadSkillData implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $skills = array(
            'jQuery',
            'PHP5',
            'Javascript',
            'Symfony 2',
            'Symfony 1',
            'SCRUM',
            'NodeJS',
            'GIT',
            'SVN',
            'MVC',
        );

        sort($skills);


        foreach ($skills as $i => $skill) {
            $skillsList[$i] = new Skill();
            $skillsList[$i]->setName($skill);

            $manager->persist($skillsList[$i]);
        }

        $manager->flush();
    }

}
