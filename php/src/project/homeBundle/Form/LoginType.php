<?php

namespace project\homeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder ->add('username', 'textarea');
        $builder ->add('Password', 'textarea');   
        
    }

  public function getName()
    {
        return 'LoginType';
    }
}

