<?php

namespace Interim\InformatiqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DiplomaType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', 'text')
                ->add('diplomaLevel', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:DiplomaLevel',
                    'property' => 'name',
                    'multiple' => false));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\InformatiqueBundle\Entity\Diploma'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_informatiquebundle_diploma';
    }

}
