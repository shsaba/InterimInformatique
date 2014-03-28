<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\Company;
use Interim\InformatiqueBundle\Form\CompanyType;

class CompanyController extends Controller
{

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:Company');

        $companies = $repo->getCompaniesWithBusinessSector();

        return $this->render('InterimInformatiqueBundle:Company:index.html.twig', array(
                    'companies' => $companies
        ));
    }

    public function addAction() {

        $company = new Company();

        $form = $this->createForm(new CompanyType, $company);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($company);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'L\'entreprise a bien été enregistrée');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_companies'));
            }
        }
        return $this->render('InterimInformatiqueBundle:Company:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }
    
    public function infosAction($id) {
        
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:Company');
        $company = $repo->getCompanyWithBusinessSector($id);

        return $this->render('InterimInformatiqueBundle:Company:infos.html.twig', array('company' => $company));
    }
    
    
    
     public function editAction(Company $company)
    {
        $form = $this->createForm(new CompanyType, $company);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'L\'entreprise a bien été modifiée');
                return $this->redirect($this->generateUrl('interim_informatique_infos_company', array(
                                    'id' => $company->getId())));
            }
        }
        return $this->render('InterimInformatiqueBundle:Company:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
