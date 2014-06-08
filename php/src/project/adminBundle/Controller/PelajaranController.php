<?php

namespace project\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use project\adminBundle\Form\regPelajaranType;
use project\muridBundle\Entity\pelajaran;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class PelajaranController extends Controller
{
    public function dataPelajaranAction(request $Request)
    {   
        $em = $this->getDoctrine()->getEntityManager();
       
        $datapelajaran = $this->getDoctrine()
                ->getRepository('muridBundle:Pelajaran')
                ->findAll();
        return $this->render('adminBundle:Pelajaran:Pelajaran.html.twig', array('datapelajaran'=>$datapelajaran));
    }

    public function tambahPelajaranAction(Request $request)
    {
         $form = $this->createForm(new regPelajaranType());
        $form->handleRequest($request);

        if ($form-> isvalid())
        {
            $namapelajaran = new pelajaran();
            $namapelajaran ->setPelajaran($form->get('Nama_Pelajaran')->getData());

            $em = $this->getDoctrine()->getManager();
            $em->persist($namapelajaran);
            $em->flush();

        return $this->redirect($this->generateUrl('data_pelajaran'));
        }
        return $this->render('adminBundle:Pelajaran:TambahPelajaran.html.twig',array('form'=> $form->createView()));
    }

     public function deletePelajaranAction(Request $request)
    {
       
                $kode_pelajaran = $request->query->get('kode_pel');
                $em = $this->getDoctrine()->getManager();
                $pelajaran = $em->getRepository('muridBundle:pelajaran')->find($kode_pelajaran);

                $em->remove($pelajaran);
                $em->flush();

                return $this->redirect($this->generateUrl('data_pelajaran'));
    }

    public function editPelajaranAction(Request $request)
    {
       
                $kode_pelajaran = $request->query->get('kode_pel');
                $pelajaran = $this->getDoctrine()->getManager()->getRepository('muridBundle:pelajaran')->find($kode_pelajaran);
                $editform = $this->createFormBuilder()
                    
                    ->add('Nama_Pelajaran','textarea',array(
                            'data'=>$pelajaran->getpelajaran()
                        ))
                                        ->add('save','submit', array(
                        'label'=>'Save',
                        ))
                   ->getForm();

                    $editform->handleRequest($request);
                    if($editform->isvalid())
                    {   
                        $pelajaran ->setPelajaran($editform->get('Nama_Pelajaran')->getData());

                        $this->getDoctrine()->getManager()->flush();
                         return $this->redirect($this->generateUrl('data_pelajaran'));                 
                    }

              return $this->render('adminBundle:Pelajaran:EditPelajaran.html.twig',array('editform'=> $editform->createView()));
    
    }

}
