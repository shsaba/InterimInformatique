<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\Diploma;
use Interim\InformatiqueBundle\Form\DiplomaType;

class DiplomaController extends Controller
{

    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:Diploma');

        $diplomas = $repo->getDiplomaWithLevel();

        return $this->render('InterimInformatiqueBundle:Diploma:index.html.twig', array(
                    'diplomas' => $diplomas
        ));
    }

    public function addAction()
    {

        $diploma = new Diploma();

        $form = $this->createForm(new DiplomaType, $diploma);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($diploma);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le diplôme a bien été enregistré');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_diplomas'));
            }
        }
        return $this->render('InterimInformatiqueBundle:Diploma:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(Diploma $diploma)
    {
        $form = $this->createForm(new DiplomaType, $diploma);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le diplôme a bien été modifié');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_diplomas'));
            }
        }
        return $this->render('InterimInformatiqueBundle:Diploma:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
