<?php

namespace Interim\EmployeeBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class EmployeeEditType extends BaseType
{

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('name', 'text')
                ->add('surname', 'text')
        ;
        parent::buildForm($builder, $options);
    }

    public function getName() {
        return 'interim_employeebundle_employee_edit_profile';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\EmployeeBundle\Entity\Employee'
        ));
    }

}
