<?php

namespace Interim\InformatiqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobSeekerType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', 'text', array(
                    'label' => 'Nom',
                    'attr' => array(
                        'class' => 'form-control')))
                ->add('surname', 'text', array(
                    'label' => 'Prénom',
                    'attr' => array(
                        'class' => 'form-control')))
                ->add('mail', 'email', array(
                    'label' => 'Mail',
                    'attr' => array(
                        'class' => 'form-control')))
                ->add('address', 'textarea', array(
                    'label' => 'Adresse',
                    'attr' => array(
                        'class' => 'form-control')))
                ->add('city', 'text', array(
                    'label' => 'Ville',
                    'attr' => array(
                        'class' => 'form-control')))
                ->add('zipCode', 'text', array(
                    'label' => 'Code postal',
                    'attr' => array(
                        'class' => 'form-control')))
                ->add('dateOfBirth', 'date', array(
                    'label' => 'Date de naissance',
                    'attr' => array(
                        'class' => 'form-control'))
                )
                ->add('file', 'file')
                ->add('phoneNumber', 'text', array(
                    'label' => 'Numéro de téléphone',
                    'attr' => array(
                        'class' => 'form-control')))
                ->add('available', 'checkbox', array(
                    'required' => false,
                    'label' => 'Disponible',
                    'attr' => array(
                        'class' => 'checkbox-inline'))
                )
                ->add('employee', 'entity', array(
                    'class' => 'InterimEmployeeBundle:Employee',
                    'property' => 'name',
                    'multiple' => false,
                    'label' => 'Conseiller',
                    'attr' => array(
                        'class' => 'form-control')
                ))
                ->add('diplomas', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:Diploma',
                    'property' => 'name',
                    'multiple' => true,
                    'label' => 'Diplômes',
                    'attr' => array(
                        'class' => 'form-control'),))
                ->add('skills', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:Skill',
                    'property' => 'name',
                    'multiple' => true,
                    'label' => 'Compétences',
                    'attr' => array(
                        'class' => 'form-control'),
                    'query_builder' => function(\Interim\InformatiqueBundle\Entity\SkillRepository $r) {
                return $r->getSkillsByOrder();
            }))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\InformatiqueBundle\Entity\JobSeeker'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_informatiquebundle_jobseeker';
    }

}
