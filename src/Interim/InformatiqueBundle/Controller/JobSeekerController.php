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

        $jobSeekers = $repo->getJobSeekersWithEmployee();

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
                $this->get('session')->getFlashBag()->add('info', 'Le collaborateur a bien été enregistré');
                return $this->redirect($this->generateUrl('interim_informatique_jobseekers'));
            }
        }
        return $this->render('InterimInformatiqueBundle:JobSeeker:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function infosAction($id) {
        
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:JobSeeker');
        $jobSeeker = $repo->getJobSeekersInfos($id);

        return $this->render('InterimInformatiqueBundle:JobSeeker:infos.html.twig', array('jobSeeker' => $jobSeeker));
    }

     public function editAction(JobSeeker $jobSeeker)
    {
        $form = $this->createForm(new JobSeekerType, $jobSeeker);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le collaborateur a bien été modifiée');
                return $this->redirect($this->generateUrl('interim_informatique_infos_jobseeker', array(
                                    'id' => $jobSeeker->getId())));
            }
        }
        return $this->render('InterimInformatiqueBundle:JobSeeker:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
