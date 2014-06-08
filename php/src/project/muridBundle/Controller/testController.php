<?php

namespace project\muridBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use project\adminBundle\Entity\user;
use project\homeBundle\Form\LoginType;

class testController extends Controller
{
	public function homeAction()
    {
        return $this->render('muridBundle:murid:home.html.twig');
    }
}
