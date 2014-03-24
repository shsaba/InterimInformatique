<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\Diploma;
use Interim\InformatiqueBundle\Form\DiplomaType;

class FrontController extends Controller
{

    public function indexAction() {

        $diplomaLevel = new Diploma();

        $form = $this->createForm(new DiplomaType, $diplomaLevel);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($diplomaLevel);
                $em->flush();
            }
        }
        return $this->render('InterimInformatiqueBundle:Front:index.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
