<?php

namespace project\adminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class regAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder ->add('nama', 'textarea');
        $builder ->add('JK', 'choice', array(
                'choices'=> array(
                    'Pria'=> 'Pria',
                    'Wanita'=> 'Wanita',
                ),
                'empty_value'=> 'Pilih jenis kelamin'
                )); 
        $builder ->add('email', 'email');     
         $builder ->add('password', 'password');             
        $builder ->add('Telepon', 'textarea');
        $builder ->add('tgl_lahir', 'date');
        $builder ->add('Alamat', 'textarea');
    }

  public function getName()
    {
        return 'regAdmin';
    }
}

