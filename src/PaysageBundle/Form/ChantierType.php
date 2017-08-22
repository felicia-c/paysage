<?php

namespace PaysageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ChantierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',            TextType::class)
            ->add('lieu',             TextType::class)
            //->add('annee',            DateTimeType::class)
            ->add('description',      TextareaType::class)
            //->add('photo',            FileType::class)
            //->add('photoUrl')
           // ->add('photoAlt',         TextType::class)


            ->add('fileVignette',     FileType::class, array(
                'required' => false ))
            ->add('vignetteAlt',         TextType::class)

            ->add('save',             SubmitType::class);;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PaysageBundle\Entity\Chantier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'paysagebundle_chantier';
    }



}
