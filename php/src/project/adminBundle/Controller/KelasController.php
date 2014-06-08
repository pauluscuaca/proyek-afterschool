<?php

namespace project\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use project\adminBundle\Form\regKelasType;
use project\muridBundle\Entity\Kelas;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class KelasController extends Controller
{
    public function dataKelasAction(request $Request)
    {   
        $em = $this->getDoctrine()->getEntityManager();
       
        $datakelas = $this->getDoctrine()
                ->getRepository('muridBundle:Kelas')
                ->findAll();
        return $this->render('adminBundle:Kelas:Kelas.html.twig', array('datakelas'=>$datakelas));
    }

    public function tambahKelasAction(Request $request)
    {
         $form = $this->createForm(new regKelasType());
        $form->handleRequest($request);

        if ($form-> isvalid())
        {
            $ruang = new kelas();
            $ruang ->setRuang($form->get('Ruang')->getData());

            $em = $this->getDoctrine()->getManager();
            $em->persist($ruang);
            $em->flush();

        return $this->redirect($this->generateUrl('data_kelas'));
        }
        return $this->render('adminBundle:Kelas:TambahKelas.html.twig',array('form'=> $form->createView()));
    }

     public function deleteKelasAction(Request $request)
    {
       
                $kode_ruang = $request->query->get('kode_ruang');
                $em = $this->getDoctrine()->getManager();
                $kelas = $em->getRepository('muridBundle:Kelas')->find($kode_ruang);

                $em->remove($kelas);
                $em->flush();

                return $this->redirect($this->generateUrl('data_kelas'));
    }

    public function editKelasAction(Request $request)
    {
       
                $kode_ruang = $request->query->get('kode_ruang');
                $kelas = $this->getDoctrine()->getManager()->getRepository('muridBundle:kelas')->find($kode_ruang);
                $editform = $this->createFormBuilder()
                    
                    ->add('ruang','textarea',array(
                            'data'=>$kelas->getruang()
                        ))
                    ->add('save','submit', array(
                        'label'=>'Save',
                        ))
                   ->getForm();

                    $editform->handleRequest($request);
                    if($editform->isvalid())
                    {   
                        $kelas ->setruang($editform->get('ruang')->getData());

                        $this->getDoctrine()->getManager()->flush();
                         return $this->redirect($this->generateUrl('data_kelas'));                 
                    }

              return $this->render('adminBundle:Kelas:EditKelas.html.twig',array('editform'=> $editform->createView()));
    
    }

}
