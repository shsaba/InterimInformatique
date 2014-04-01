<?php

// src/Interim/EmployeeBundle/DataFixtures/ORM/LoadEmployeeData.php

namespace Interim\EmployeeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Interim\EmployeeBundle\Entity\Employee;

class LoadEmployeeData implements FixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $employees = array();

        $employees[1] = new Employee;
        $employees[1]->setName('SABA');
        $employees[1]->setSurname('Shy');
        $employees[1]->setUsername('SAB01');
        $employees[1]->setEmail('shysab@gmail.com');
        $employees[1]->setPassword('12101989');

        $employees[2] = new Employee;
        $employees[2]->setName('Galarneau');
        $employees[2]->setSurname('Patrick');
        $employees[2]->setUsername('GAL01');
        $employees[2]->setEmail('gala@gmail.com');
        $employees[2]->setPassword('12101989');

        $employees[3] = new Employee;
        $employees[3]->setName('Neufville');
        $employees[3]->setSurname('Maurice');
        $employees[3]->setUsername('NEU01');
        $employees[3]->setEmail('neufv@gmail.com');
        $employees[3]->setPassword('12101989');



        foreach ($employees as $employee) {
            $manager->persist($employee);
        }

        $manager->flush();
    }

}
