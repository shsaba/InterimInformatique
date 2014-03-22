<?php

namespace Interim\InformatiqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompanyType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name')
                ->add('address')
                ->add('city')
                ->add('zipCode')
                ->add('logo')
                ->add('description')
                ->add('contactName')
                ->add('contactSurname')
                ->add('contactMail')
                ->add('idNumber')
                ->add('password')
                ->add('businessSector', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:BusinessSector',
                    'property' => 'name',
                    'multiple' => false));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\InformatiqueBundle\Entity\Company'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_informatiquebundle_company';
    }

}
