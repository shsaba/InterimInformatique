<?php

namespace Interim\InformatiqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MeetingEmployeeJobSeekerType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('employee', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:Employee',
                    'property' => 'name',
                    'multiple' => false))
                ->add('jobSeeker', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:JobSeeker',
                    'property' => 'name',
                    'multiple' => false))
                ->add('date', 'date')
                ->add('note', 'textarea')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\InformatiqueBundle\Entity\MeetingEmployeeJobSeeker'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_informatiquebundle_meetingemployeejobseeker';
    }

}
