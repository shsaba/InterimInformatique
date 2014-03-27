<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\Job;
use Interim\InformatiqueBundle\Form\JobType;

class JobController extends Controller
{

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:Job');

        $jobs = $repo->findAll();

        return $this->render('InterimInformatiqueBundle:Job:index.html.twig', array(
                    'jobs' => $jobs
        ));
    }

    public function addAction() {

        $em = $this->getDoctrine()->getManager();

        $job = new Job();

        $form = $this->createForm(new JobType, $job);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em->persist($job);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'L\'offre a bien été enregistré');
                return $this->redirect($this->generateUrl('interim_informatique_jobs'));
            }
        }
        return $this->render('InterimInformatiqueBundle:Job:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

}
