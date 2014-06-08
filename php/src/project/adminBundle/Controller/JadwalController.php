<?php

namespace project\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use project\adminBundle\Form\regAdminType;
use project\adminBundle\Entity\admin;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class JadwalController extends Controller
{
    public function muridAction()
    {
    $form = $this->createForm(new regJadwalType());
        $form->handleRequest($request);
        //$admin = new admin();

        if ($form-> isvalid())
        {
            $jadwal = new regJadwalType();
            $jadwal ->setwaktu($form->get('jadwal')->getData());

            $em = $this->getDoctrine()->getManager();
            $em->persist($jadwal);
            $em->flush();

            return $this->render('adminBundle:admin:dataadmin.html.twig');
        }
        return $this->render('adminBundle:admin:registeradmin.html.twig',array('form'=> $form->createView()));
    }
}
