<?php

namespace project\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use project\adminBundle\Form\regAdminType;
use project\adminBundle\Entity\admin;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
class adminController extends Controller
{
	public function adminAction()
    {
        return $this->render('adminBundle:admin:admin.html.twig');
    }

	public function dataadminAction(request $Request)
    {   
        $em = $this->getDoctrine()->getEntityManager();
       
        $admin = $this->getDoctrine()
                ->getRepository('adminBundle:admin')
                ->findAll();
        
      
      return $this->render('adminBundle:admin:dataadmin.html.twig', array('admin'=>$admin));
    }    

    public function deleteAdminAction(Request $request)
    {
       
                $id_user = $request->query->get('id_admin');
                $em = $this->getDoctrine()->getManager();
                $admin = $em->getRepository('homeBundle:user')->find($id_user);

                $em->remove($admin);
                $em->flush();

                return $this->redirect($this->generateUrl('data_admin'));
                }

    public function editAdminAction(Request $request)
    {   

        $id_user = $request->query->get('id_admin');
        $user = $this->getDoctrine()->getRepository('homeBundle:user')->find($id_user);
       
                $editform = $this->createFormBuilder()
                    
                    ->add('id','text',array(
                            'data'=>$user->getid()
                        ))
                    ->add('username','text',array(
                            'data'=>$user->getUsername()
                        ))
                    ->add('nama','text',array(
                            'data'=>$user->getUsername()
                        ))
                    ->add('JK', 'choice', array(
                            'choices'=> array(
                            'Pria'=> 'Pria',
                            'Wanita'=> 'Wanita',
                            'data'=>$user->getJK()
                            ),
                      ))
                    ->add('email', 'email',array(
                            'data'=>$user->getemail()
                        ))     
                    ->add('password','repeated',array(
                            'type' => 'password',
                            'invalid_message'=> "Password didn't match.",
                            'first_options'=> array('label'=>'New Password'),
                            'second_options'=> array('label'=>'Retype New Password'),
                            'required'=>false,
                        ))           
                    ->add('Telepon', 'textarea',array(
                            'data'=>$user->gettelepon()
                        ))
                    ->add('tgl_lahir', 'date',array(
                            'data'=>$user->gettglLahir()
                        ))
                    ->add('Alamat', 'textarea',array(
                            'data'=>$user->getalamat()
                        ))  
                    ->add('save','submit', array(
                        'label'=>'Save',
                        ))

                    ->getForm();

                    $editform->handleRequest($request);
                    if($editform->isvalid())
                    {  
                     $em = $this->getDoctrine()->getManager();
                        $user = $em->getRepository('homeBundle:user')->find($id_user);
                        $user ->setRoles(array('ROLE_ADMIN'));
                        $user ->setusername($editform->get('nama')->getData());
                        $user ->setemail($editform->get('email')->getData());
                        $user ->setPlainpassword($editform->get('password')->getData());
                        $user ->setnama($editform->get('nama')->getData());
                        $user ->setJK($editform->get('JK')->getData());
                        $user ->settelepon($editform->get('Telepon')->getData());
                        $user ->settglLahir($editform->get('tgl_lahir')->getData());
                        $user ->setEnabled('1');
                        $user ->setalamat($editform->get('Alamat')->getData());


                        $this->get('fos_user.user_manager')->updateUser($user, false);

                        $this->getDoctrine()->getManager()->flush();
                        return $this->redirect($this->generateUrl('data_admin'));


                     }
            return $this->render('adminBundle:admin/admin:editform.html.twig',array('editform'=> $editform->createView()));
    
    }
    public function regadminAction(Request $request)
    {
    	$form = $this->createForm(new regAdminType());
        $form->handleRequest($request);
        //$admin = new admin();

        if ($form-> isvalid())
        {
            $userManager = $this->get('fos_user.user_manager');
            $user = $userManager->createUser();
            $admin = new admin();
            $user->setRoles(array('ROLE_ADMIN'));
            $user ->setusername($form->get('nama')->getData());
            $user ->setemail($form->get('email')->getData());
            $user ->setPlainpassword($form->get('password')->getData());
            $user ->setnama($form->get('nama')->getData());
            $user ->setJK($form->get('JK')->getData());
            $user ->settelepon($form->get('Telepon')->getData());
            $user ->settglLahir($form->get('tgl_lahir')->getData());
            $user->setEnabled('1');
            $user ->setalamat($form->get('Alamat')->getData());

            $userManager->updateUser($user);
            $admin->setuseradmin($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->render('adminBundle:admin:dataadmin.html.twig');
        }
        return $this->render('adminBundle:admin:registeradmin.html.twig',array('form'=> $form->createView()));
    }
}
