<?php

namespace project\adminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class regKelasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder ->add('Ruang', 'text');

    }

  public function getName()
    {
        return 'regKelas';
    }
}

