<?php

namespace TemoinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TemoinsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomTemoin' , 'text')
            ->add('Description', 'text')
            ->add('Theorie')
            
            ->add('numLot')
            ->add('qteDepart')
            ->add('qteActuelle')
            ->add('Dluo', 'date')

        ;
    }


    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HomeBundle\Entity\Temoins'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'temoinsBundle_type';
    }
}
