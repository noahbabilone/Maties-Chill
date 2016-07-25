<?php

namespace MCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeanceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', 'text', array(
                    'label' => 'Date séance',
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control input_date_session',
                        /* 'placeholder' => 'Fonction',
                         'autocomplete' => 'off'*/
                    ),
                )
            )
            ->add('typeView', 'choice', array(
                    'label' => 'Visionnage',
                    'choices' => array(
                        "VF" => "Version Française (VF)",
                        "VO" => "Version Originale (VO)",
                        "VOSTF" => "Version Originale sous-titrée en Français (VOSTFR)",
                        "VOST" => "Version Originale sous-titré (VOST)",
                        "VF3D" => "VF en 3D",
                        "V03D" => "V0 en 3D",
                    ),
                    'attr' => array(
                        'class' => 'form-control service',
                        'placeholder' => 'service',
                    ),

                )
            )
            ->add('description', 'textarea', array(
                    'label' => 'Description',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Description ',
                        'autocomplete' => 'off'
                    ),

                )
            )
            ->add('contribution', 'text', array(
                    'label' => 'Contribution',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Contribution',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('price', 'number', array(
                    'label' => 'Prix',
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Prix',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('maxPlace', 'number', array(
                    'label' => 'Nombre de place',
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control',
                        'placeholder' => 'Nombre de place',
                        'autocomplete' => 'off'
                    ),
                )
            )
            ->add('address', 'entity', array(
                    'label' => 'Adresse',
                    'class' => 'MCBundle:Address',
                    'property' => 'title',
                    'attr' => array(
                        'class' => 'form-control',
                        'autocomplete' => 'off',
                    ),
                )
            )
            ->add('filmId', 'text', array(
                    'label' => 'Film',
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control input_film',
                        /* 'placeholder' => 'Fonction',
                         'autocomplete' => 'off'*/
                    ),
                )
            )
            ->add('material', 'entity', array(
                    'label' => 'Materiel',

                    'class' => 'MCBundle:Material',
                    'property' => 'title',
                    'multiple' => true,
                    'attr' => array(
                        'class' => 'form-control',
                        'autocomplete' => 'off'),
                )
            )  
            ->add('modality', 'entity', array(
                    'label' => 'Modalité',
                    'required' => true,
                    'class' => 'MCBundle:Modality',
                    'property' => 'title',
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control modality',
                        'autocomplete' => 'off'),
                )
            )

//            ->add('participant')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCBundle\Entity\Seance'
        ));
    }
}
