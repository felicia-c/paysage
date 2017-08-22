<?php

namespace Paysage\PaysageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ChantierEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder->remove('date');
    }

    public function getParent()
    {
        return ChantierType::class;
    }
}
