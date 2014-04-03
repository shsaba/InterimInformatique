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
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $order = "ASC";
        $builder
                ->add('name', 'text')
                ->add('diplomaLevel', 'entity', array(
                    'class' => 'InterimInformatiqueBundle:DiplomaLevel',
                    'property' => 'name',
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control'),
                        'query_builder' => function(\Interim\InformatiqueBundle\Entity\DiplomaLevelRepository $r) use ($order)  {
                 return $r->getDiplomaLevelByOrder($order);
            })
        );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\InformatiqueBundle\Entity\Diploma'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'interim_informatiquebundle_diploma';
    }

}
