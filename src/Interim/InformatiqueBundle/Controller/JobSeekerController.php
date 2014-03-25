<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\JobSeeker;
use Interim\InformatiqueBundle\Form\JobSeekerType;

class JobSeekerController extends Controller
{

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:JobSeeker');

        $jobSeekers = $repo->findAll();

        return $this->render('InterimInformatiqueBundle:JobSeeker:index.html.twig', array(
                    'jobSeekers' => $jobSeekers
        ));
    }

    public function addAction() {

        $em = $this->getDoctrine()->getManager();

        $jobSeeker = new JobSeeker();

        $form = $this->createForm(new JobSeekerType, $jobSeeker);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em->persist($jobSeeker);
                $em->flush();
            }
        }
        return $this->render('InterimInformatiqueBundle:JobSeeker:add.html.twig', array(
            'form' => $form->createView()
                )
        );
    }

}
