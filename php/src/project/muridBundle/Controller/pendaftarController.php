<?php

namespace project\muridBundle\Controller;

use project\adminBundle\Entity\DataPendaftaran;
use project\muridBundle\Form\regPendaftarType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class pendaftarController extends Controller
{
	public function regpendaftarAction(Request $request)
    {
    	$form = $this->createForm(new regPendaftarType());
        $form->handleRequest($request);

        if ($form-> isvalid())
        {
            $userManager = $this->get('fos_user.user_manager');
            $user = $userManager->createUser();

            $pendaftar = new DataPendaftaran();
            $user ->setRoles(array('ROLE_MURID'));
            $user ->setusername($form->get('username')->getData());
            $user ->setemail($form->get('email')->getData());
            $user ->setPlainpassword($form->get('password')->getData());
            $user ->setnama($form->get('nama')->getData());
            $user ->setJK($form->get('JK')->getData());
            $user ->settelepon($form->get('Telepon')->getData());
            $user ->settglLahir($form->get('tgl_lahir')->getData());
            $user ->setEnabled('0');
            $user ->setalamat($form->get('Alamat')->getData());

            $pendaftar ->setagama($form->get('agama')->getData());
            $pendaftar ->setwarganegara($form->get('warganegara')->getData());
            $pendaftar ->setsekolah($form->get('namasekolah')->getData());
            $pendaftar ->settingkatpendidikan($form->get('tingkat')->getData());
            
            $userManager->updateUser($user);

            $pendaftar->setUserpendaftar($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($pendaftar);
            $em->flush();

            return $this->redirect($this->generateUrl('home'));
        }
        return $this->render('muridBundle:murid:daftar.html.twig',array('form'=> $form->createView()));
    }
}
