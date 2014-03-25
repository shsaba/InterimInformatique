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
                ->add('name', 'text')
                ->add('address', 'textarea')
                ->add('city', 'text')
                ->add('zipCode', 'text')
                ->add('file', 'file')
                ->add('description', 'textarea')
                ->add('contactName', 'text')
                ->add('contactSurname', 'text')
                ->add('contactMail', 'email')
                ->add('idNumber', 'text')
                ->add('password', 'password')
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
