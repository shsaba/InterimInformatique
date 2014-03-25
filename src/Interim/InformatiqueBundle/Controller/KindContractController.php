<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\KindContract;
use Interim\InformatiqueBundle\Form\KindContractType;

class KindContractController extends Controller
{

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:KindContract');

        $kindsContracts = $repo->findBy(array(), array('name' => 'asc'));

        return $this->render('InterimInformatiqueBundle:KindContract:index.html.twig', array(
                    'kindsContracts' => $kindsContracts
        ));
    }

    public function addAction() {

        $kindContract = new KindContract();

        $form = $this->createForm(new KindContractType(), $kindContract);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($kindContract);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le type de contrat a bien été enregistré');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_kind_contracts'));
            }
        }
        return $this->render('InterimInformatiqueBundle:KindContract:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

}
