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
            ->add('name')
            ->add('surname')
            ->add('mail')
            ->add('address')
            ->add('city')
            ->add('zipCode')
            ->add('dateOfBirth')
            ->add('cv')
            ->add('username')
            ->add('password')
            ->add('phoneNumber')
            ->add('available')
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
                    'multiple' => false))
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
