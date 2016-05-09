<?php

namespace MCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('street')
            ->add('frontDoor')
            ->add('floor')
            ->add('building')
            ->add('address')
            ->add('address2')
            ->add('phone')
            ->add('postCode')
            ->add('town')
            ->add('other')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCBundle\Entity\Address'
        ));
    }
}
