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
            ->add('title', 'text', array(
                    'label' => 'Titre',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Titre de l\'adresse',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('street', 'text', array(
                    'label' => 'Rue',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '1',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('frontDoor', 'text', array(
                    'label' => 'Porte',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '712',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('floor', 'text', array(
                    'label' => 'Étage',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '1',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('building', 'text', array(
                    'label' => 'Bât',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Bâtiment',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('address', 'text', array(
                    'label' => 'Adresse',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '1 rue des vosges',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('address2', 'text', array(
                    'label' => 'Suite de l\'address',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Suite adresse',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('phone', 'text', array(
                    'label' => 'Téléphone',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '0102030405',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('postCode', 'text', array(
                    'label' => 'Code postal',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '75001',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('town', 'text', array(
                    'label' => 'Ville',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Paris',
                        'autocomplete' => 'off'
                    ),
                )
            )
           /* ->add('other', 'text', array(
                    'label' => 'Titre',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Autres',
                        'autocomplete' => 'off'
                    ),
                )
            )*/;
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
