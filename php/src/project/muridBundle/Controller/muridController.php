<?php

namespace project\muridBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class muridController extends Controller
{
	public function profilAction()
    {
        $murid = $this->get('security.context')->getToken->getUser->getId();
 $mrd = $this->getDoctrine()->getManager()->getRepository('muridBundle:murid')->find($murid);
 		// exit(\Doctrine\Common\Util\Debug::dump($mrd));
      return $this->render('muridBundle:murid:profil.html.twig', array('profil'=>$mrd));
    }
}
