<?php

namespace project\homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('homeBundle:login:login.html.twig',array('form'=> $form->createView()));
    }
}
