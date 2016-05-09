<?php

namespace MCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterialType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('typeMaterial', 'entity', array(
                    'class' => 'MCBundle:TypeMaterial',
                    'property' => 'title',
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'autocomplete' => 'off'),
                )
            )//            ->add('user')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCBundle\Entity\Material'
        ));
    }
}
