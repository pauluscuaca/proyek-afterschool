<?php

namespace project\adminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class regPelajaranType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder ->add('Nama_Pelajaran', 'textarea');

    }

  public function getName()
    {
        return 'regPelajaran';
    }
}

