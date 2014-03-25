<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\Employee;
use Interim\InformatiqueBundle\Form\EmployeeType;

class EmployeeController extends Controller
{

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:Employee');

        $employees = $repo->findAll();

        return $this->render('InterimInformatiqueBundle:Employee:index.html.twig', array(
                    'employees' => $employees
        ));
    }

    public function addAction() {

        $employee = new Employee();

        $form = $this->createForm(new EmployeeType, $employee);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($employee);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'L\'employé a bien été enregistré');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_employees'));
            }
        }
        return $this->render('InterimInformatiqueBundle:Employee:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

}
