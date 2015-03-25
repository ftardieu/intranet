<?php

namespace TemoinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CartesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomTemoin', 'entity', array('class'=>'HomeBundle\Entity\Temoins', 'property'=>'nomTemoin'))
            ->add('NomAnalyse', 'entity', array('class'=>'HomeBundle\Entity\Analyses', 'property'=>'libelle'))
            ->add('Ecart')
        ;
    }


    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HomeBundle\Entity\Cartes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cartesBundle_type';
    }
}
