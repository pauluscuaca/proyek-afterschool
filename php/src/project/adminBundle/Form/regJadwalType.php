<?php

namespace project\adminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class regType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder ->add('jadwal', 'datetime');

    }

  public function getName()
    {
        return 'regJadwal';
    }
}

