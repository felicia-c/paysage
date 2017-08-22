<?php
namespace Paysage\PaysageBundle\Form;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FormType;


class ChantierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',             TextType::class)
            // ->add('theme',           EntityType::class, array(
            //     'class'        => 'MacifAtelierBundle:Theme',
            //     'choice_label' => 'name',
            //     'multiple'     => false ))
            // ->add('region',           EntityType::class, array(
            //     'class'        => 'MacifatelierBundle:Region',
            //     'choice_label' => 'name',
            //     'multiple'     => false ))
            // ->add('lieux',             TextType::class, array(
            //     'required' => false ))
            // ->add('contreTexte',      TextareaType::class)
            // ->add('texte',            TextareaType::class)
            // ->add('file',             FileType::class, array(
            //     'required' => false ))

            //->add('imageAlt',         TextType::class)
            ->add('photo',     FileType::class, array(
                'required' => false ))
            ->add('lieu',         TextType::class)

            // ->add('photographe',      TextType::class)
            //->add('photoInfo',        TextType::class)

            //->add('contactName',      TextType::class)
            //->add('contactTitle',     TextType::class)
            //->add('contactEmail',     EmailType::class)

            //->add('website',          UrlType::class)

            // ->add('facebook',         UrlType::class, array(
            //     'required' => false ))
            // ->add('twitter',          UrlType::class, array(
            //     'required' => false ))


            ->add('description', TextareaType::class)
            //->add('destination',      TextType::class)
            //->add('media',            UrlType::class)
            ->add('enregistrer',      SubmitType::class);

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Paysage\PaysageBundle\Entity\Chantier'
        ));
    }
}
