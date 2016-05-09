<?php

namespace MCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ISAN')
            ->add('title')
            ->add('originalTitle')
            ->add('releaseDate', 'datetime')
            ->add('directors')
            ->add('actors')
            ->add('nationality')
            ->add('runtime')
            ->add('ageLimit')
            ->add('pressRating')
            ->add('userRating')
            ->add('link')
            ->add('trailer')
            ->add('poster')
            ->add('synopsisShort')
            ->add('synopsis')
            ->add('genre')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCBundle\Entity\Film'
        ));
    }
}
