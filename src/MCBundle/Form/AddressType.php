<?php

namespace MCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('title', TextType::class, array(
                    'label' => 'Titre',
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Titre de l\'adresse',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('street', TextType::class, array(
                    'label' => 'Rue',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '1',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('frontDoor', TextType::class, array(
                    'label' => 'Porte',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '712',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('floor', TextType::class, array(
                    'label' => 'Étage',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '1',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('building', TextType::class, array(
                    'label' => 'Bât',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Bâtiment',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('address', TextType::class, array(
                    'label' => 'Adresse',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '1 rue des vosges',
                        'autocomplete' => 'off'
                    ),
                )
            )
           
            ->add('phone', TextType::class, array(
                    'label' => 'Téléphone',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '0102030405',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('postCode', TextType::class, array(
                    'label' => 'Code postal',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => '75001',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('town', TextType::class, array(
                    'label' => 'Ville',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Paris',
                        'autocomplete' => 'off'
                    ),
                )
            )
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
