<?php

namespace project\muridBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class regPendaftarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder ->add('nama', 'textarea');
        $builder ->add('username', 'textarea');
        $builder ->add('JK', 'choice', array(
                'choices'=> array(
                    'Pria'=> 'Pria',
                    'Wanita'=> 'Wanita',
                ),
                'empty_value'=> 'Pilih jenis kelamin'
                )); 
        $builder ->add('email', 'email');     
        $builder ->add('agama', 'textarea');
        $builder ->add('warganegara', 'textarea');      
        $builder ->add('email', 'email');   
        $builder ->add('password', 'password');             
        $builder ->add('Telepon', 'textarea');
        $builder ->add('tgl_lahir', 'date', array(
                    'widget'=>'choice',
                    'days'=>range(3,5)
                );

        $builder ->add('Alamat', 'textarea');
        $builder ->add('namasekolah', 'textarea');
        $builder ->add('tingkat', 'choice', array(
                    'choices'=> array(
                    'SMP I'=> 'SMP I',
                    'SMP II'=> 'SMP II',
                    'SMP III'=> 'SMP III',
                    'SMA I'=> 'SMA I',
                    'SMA II'=> 'SMA II',
                    'SMA III'=> 'SMA III',
                         ),
                    'empty_value'=> 'Pilih Kelas'
            ));
        $builder->add('save','submit', array(
                'label'=>"Save",
            ));
        $builder->add('save','cancel', array(
                'label'=>"cancel",
            ));
        
    }

  public function getName()
    {
        return 'regPendaftar';
    }
}

