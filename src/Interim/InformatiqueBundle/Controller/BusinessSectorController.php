<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\BusinessSector;
use Interim\InformatiqueBundle\Form\BusinessSectorType;

class BusinessSectorController extends Controller
{

    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:BusinessSector');

        $businessSectors = $repo->findBy(array(), array(
            'name' => 'asc'));

        return $this->render('InterimInformatiqueBundle:BusinessSector:index.html.twig', array(
                    'businessSectors' => $businessSectors
        ));
    }

    public function addAction()
    {

        $businessSector = new BusinessSector();

        $form = $this->createForm(new BusinessSectorType, $businessSector);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($businessSector);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le secteur a bien été enregistré');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_business_sectors'));
            }
        }
        return $this->render('InterimInformatiqueBundle:BusinessSector:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(BusinessSector $businessSector)
    {
        $form = $this->createForm(new BusinessSectorType, $businessSector);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le secteur a bien été modifié');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_infos_business_sector', array(
                                    'id' => $businessSector->getId())));
            }
        }
        return $this->render('InterimInformatiqueBundle:BusinessSector:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
