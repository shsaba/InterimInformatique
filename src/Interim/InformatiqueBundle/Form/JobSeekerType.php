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
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text')
                ->add('surname', 'text')
                ->add('mail', 'email')
                ->add('address', 'textarea')
                ->add('city', 'text')
                ->add('zipCode', 'text')
                ->add('dateOfBirth', 'date')
                ->add('file', 'file')
                ->add('username', 'text')
                ->add('password', 'password')
                ->add('phoneNumber', 'text')
                ->add('available', 'checkbox')
                ->add('employee', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:Employee',
                    'property' => 'name',
                    'multiple' => false))
                ->add('diplomas', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:Diploma',
                    'property' => 'name',
                    'multiple' => true))
                ->add('skills', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:Skill',
                    'property' => 'name',
                    'multiple' => true,
                    'query_builder' => function(\Interim\InformatiqueBundle\Entity\SkillRepository $r) {
                return $r->getSkillsByOrder();
            }))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\InformatiqueBundle\Entity\JobSeeker'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'interim_informatiquebundle_jobseeker';
    }

}
