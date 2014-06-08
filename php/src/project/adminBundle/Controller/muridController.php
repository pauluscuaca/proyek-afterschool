<?php

namespace project\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use project\muridBundle\Entity\murid;
use project\adminBundle\Entity\DataPendaftaran;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class muridController extends Controller
{
	public function muridAction()
    {
        return $this->render('adminBundle:admin:admin.html.twig');
    }

    public function dataMuridAction(request $Request)
    {   
        $murid = $this->getDoctrine()
                ->getRepository('muridBundle:murid')
                ->findAll();

      
      return $this->render('adminBundle:murid:datamurid.html.twig', array('datamurid'=>$murid));
    }
   
   public function deleteMuridAction(Request $request)
    {
       
                $id_user = $request->query->get('id_user');
                $id_pendaftaran = $request->query->get('id_pendaftaran');
                $no_induk = $request->query->get('no_induk');
                $em = $this->getDoctrine()->getManager();
                
                $induk = $em->getRepository('muridBundle:murid')->find($no_induk);
                $em->remove($induk);
                $em->flush();

                $user = $em->getRepository('homeBundle:user')->find($id_user);
                $em->remove($user);
                $em->flush();

                
                return $this->redirect($this->generateUrl('data_murid'));
    }

   //    public function editpendaftarAction(Request $request)
   //  {   

   //      $id_pndftr = $request->query->get('id_pndftr');
   //      $id_dftr= $request->query->get('id_dftr');
   //      $user = $this->getDoctrine()->getManager()->getRepository('homeBundle:user')->find($id_pndftr);
   //      $pendaftar =  $this->getDoctrine()->getRepository('adminBundle:DataPendaftaran')->find($id_dftr);
        
   //              $editform = $this->createFormBuilder()
                    
   //                  ->add('username','text',array(
   //                          'data'=>$user->getUsername()
   //                      ))
   //                  ->add('nama','text',array(
   //                          'data'=>$user->getUsername()
   //                      ))
   //                  ->add('JK', 'choice', array(
   //                          'choices'=> array(
   //                          'Pria'=> 'Pria',
   //                          'Wanita'=> 'Wanita',
   //                          'data'=>$user->getJK()
   //                          ),
   //                    ))
   //                  ->add('email', 'email',array(
   //                          'data'=>$user->getemail()
   //                      ))     
   //                  ->add('password','repeated',array(
   //                          'type' => 'password',
   //                          'invalid_message'=> "Password didn't match.",
   //                          'first_options'=> array('label'=>'New Password'),
   //                          'second_options'=> array('label'=>'Retype New Password'),
   //                          'required'=>false,
   //                      ))           
   //                  ->add('Telepon', 'textarea',array(
   //                          'data'=>$user->gettelepon()
   //                      ))
   //                  ->add('tgl_lahir', 'date',array(
   //                          'data'=>$user->gettglLahir()
   //                      ))
   //                  ->add('Alamat', 'textarea',array(
   //                          'data'=>$user->getalamat()
   //                      )) 
   //                  ->add('Agama', 'textarea',array(
   //                          'data'=>$pendaftar->getagama()
   //                      ))     
   //                  ->add('warganegara', 'textarea',array(
   //                          'data'=>$pendaftar->getwarganegara()
   //                      ))
   //                  ->add('Sekolah', 'textarea',array(
   //                          'data'=>$pendaftar->getsekolah()
   //                      ))
   //                  ->add('tingkat_pendidikan', 'choice', array(
   //                  'choices'=> array(
   //                  'SMP I'=> 'SMP I',
   //                  'SMP II'=> 'SMP II',
   //                  'SMP III'=> 'SMP III',
   //                  'SMA I'=> 'SMA I',
   //                  'SMA II'=> 'SMA II',
   //                  'SMA III'=> 'SMA III',
   //                      ),
   //                  'data'=>$pendaftar->getTingkatpendidikan()))
    
   //                  ->add('Pembayaran', 'choice', array(
   //                  'choices'=> array(
   //                  'Lunas'=> 'Lunas',
   //                  'Belum Lunas'=> 'Belum Lunas',
   //                      ),
   //                  'data'=>$pendaftar->getPembayaran()))

   //                  ->add('Tgl_Pembayaran', 'date',array(
   //                           'data'=>$pendaftar->getTglPembayaran()))
   //                  ->add('save','submit', array(
   //                      'label'=>'Save',
   //                      ))

   //                  ->getForm();

   //                  $editform->handleRequest($request);
   //                  if($editform->isvalid())
   //                  {  
   //                      $user ->setRoles(array('ROLE_ADMIN'));
   //                      $user ->setusername($editform->get('nama')->getData());
   //                      $user ->setemail($editform->get('email')->getData());
   //                      $user ->setPlainpassword($editform->get('password')->getData());
   //                      $user ->setnama($editform->get('nama')->getData());
   //                      $user ->setJK($editform->get('JK')->getData());
   //                      $user ->settelepon($editform->get('Telepon')->getData());
   //                      $user ->settglLahir($editform->get('tgl_lahir')->getData());
   //                      if($editform->get("Pembayaran")->getData()=="Lunas"){
   //                      $user ->setEnabled('1');
   //                      $murid = new murid();
   //                      $murid -> setDataPendaftaran($pendaftar);
   //                      $em = $this->getDoctrine()->getManager();
   //                      $em->persist($murid);
   //                      $em->flush();
   //                      }
   //                      else{
   //                      $user ->setEnabled('0');    
   //                      }
   //                      $user ->setalamat($editform->get('Alamat')->getData());
   //                      $pendaftar ->setAgama($editform->get('Agama')->getData());
   //                      $pendaftar ->setwarganegara($editform->get('warganegara')->getData());
   //                      $pendaftar ->setSekolah($editform->get('Sekolah')->getData());
   //                      $pendaftar ->setTingkatPendidikan($editform->get('tingkat_pendidikan')->getData());
   //                      $pendaftar ->setPembayaran($editform->get('Pembayaran')->getData());
   //                      $pendaftar ->setTglPembayaran($editform->get('Tgl_Pembayaran')->getData());
   //                      $this->get('fos_user.user_manager')->updateUser($user, false);



   //                      $this->getDoctrine()->getManager()->flush();
   //                      return $this->redirect($this->generateUrl('data_pendaftar'));


   //                   }
   //          return $this->render('adminBundle:Pendaftar:edit.html.twig',array('editform'=> $editform->createView()));
    
    // }
}
