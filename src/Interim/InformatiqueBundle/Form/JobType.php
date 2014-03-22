<?php

namespace Interim\InformatiqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('postName', 'text')
                ->add('description', 'textarea')
                ->add('profile', 'textarea')
                ->add('postSheet', 'file')
                ->add('address', 'text')
                ->add('city', 'text')
                ->add('zipCode', 'text')
                ->add('contractStartDate')
                ->add('contractEndDate')
                ->add('skills', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:Skills',
                    'property' => 'name',
                    'multiple' => true))
                ->add('diplomaLevels', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:DiplomaLevel',
                    'property' => 'name',
                    'multiple' => true))
                ->add('company', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:Company',
                    'property' => 'name',
                    'multiple' => false))
                ->add('kindContracts', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:KindContract',
                    'property' => 'name',
                    'multiple' => true))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\InformatiqueBundle\Entity\Job'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_informatiquebundle_job';
    }

}
