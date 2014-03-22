<?php

namespace Interim\InformatiqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobContractType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('job', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:Job',
                    'property' => 'postName',
                    'multiple' => false))
                ->add('jobSeeker', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:JobSeeker',
                    'property' => 'name',
                    'multiple' => false))
                ->add('kindContract', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:KindContract',
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
            'data_class' => 'Interim\InformatiqueBundle\Entity\JobContract'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_informatiquebundle_jobcontract';
    }

}
