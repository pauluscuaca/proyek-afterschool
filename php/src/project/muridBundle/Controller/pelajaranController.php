<?php

namespace project\muridBundle\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class pelajaranController extends Controller
{
	public function datapelajaranAction(Request $request)
    {   $em = $this->getDoctrine()->getEntityManager();
       
        $pelajaran = $this->getDoctrine()
                ->getRepository('muridBundle:pelajaran')
                ->findAll();
        
      
      return $this->render('muridBundle:pelajaran:pengambilanpelajaran.html.twig', array('pelajaran'=>$pelajaran));
    }

	public function pengambilanpelajaranAction(Request $request)
    {  
    			$ambil = $request->query->get('id_admin');
                $em = $this->getDoctrine()->getManager();
                $admin = $em->getRepository('homeBundle:user')->find($id_user);

                $em->remove($admin);
                $em->flush();

                return $this->redirect($this->generateUrl('data_admin'));
        return $this->render('muridBundle:murid:murid.html.twig');
    }
}
