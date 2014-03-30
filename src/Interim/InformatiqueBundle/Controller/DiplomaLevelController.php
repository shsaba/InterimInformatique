<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\DiplomaLevel;
use Interim\InformatiqueBundle\Form\DiplomaLevelType;


class DiplomaLevelController extends Controller
{

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:DiplomaLevel');

        $diplomasLevels = $repo->findAll();

        return $this->render('InterimInformatiqueBundle:DiplomaLevel:index.html.twig', array(
                    'diplomasLevels' => $diplomasLevels
        ));
    }

    public function addAction() {

        $diplomaLevel = new DiplomaLevel();

        $form = $this->createForm(new DiplomaLevelType, $diplomaLevel);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($diplomaLevel);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le niveau de diplômes a bien été enregistré');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_diplomas_levels'));
            }
        }
        return $this->render('InterimInformatiqueBundle:DiplomaLevel:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(DiplomaLevel $diplomaLevel)
    {
        $form = $this->createForm(new DiplomaLevelType, $diplomaLevel);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le niveau de diplômes a bien été modifié');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_diplomas_levels'));
            }
        }
        return $this->render('InterimInformatiqueBundle:DiplomaLevel:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }
}
