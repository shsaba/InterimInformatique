<?php

namespace Interim\InformatiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Interim\InformatiqueBundle\Entity\Skill;
use Interim\InformatiqueBundle\Form\SkillType;

class SkillController extends Controller
{

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('InterimInformatiqueBundle:Skill');

        $skills = $repo->findBy(array(), array('name' => 'asc'));

        return $this->render('InterimInformatiqueBundle:Skill:index.html.twig', array(
                    'skills' => $skills
        ));
    }

    public function addAction() {

        $skill = new Skill();

        $form = $this->createForm(new SkillType(), $skill);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($skill);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'La compétence a bien été enregistrée');
                return $this->redirect($this->generateUrl('interim_informatique_configuration_skills'));
            }
        }
        return $this->render('InterimInformatiqueBundle:Skill:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

}
