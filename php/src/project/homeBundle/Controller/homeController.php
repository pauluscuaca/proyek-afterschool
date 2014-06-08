<?php

namespace project\homeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use project\adminBundle\Entity\user;
use project\homeBundle\Form\LoginType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use project\adminBundle\Entity\DataPendaftaran;
use project\muridBundle\Form\regPendaftarType;
use Symfony\Component\Security\Core\SecurityContext;

class homeController extends Controller
{
	public function homeAction()
    {
        return $this->render('homeBundle:home:home.html.twig');
    }

    public function aboutAction(Request $request)
    {

        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        return $this->aboutLogin(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
        ));
        // return $this->render('homeBundle:home:about.html.twig');
    }

    protected function aboutLogin(array $data)
    {     $template = sprintf('homeBundle:home:about.html.%s', $this->container->getParameter('fos_user.template.engine'));

          return $this->container->get('templating')->renderResponse($template, $data);
    }

    public function programAction(Request $request)
    {
/** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        return $this->programLogin(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
        ));
    }

    protected function programLogin(array $data)
    {     $template = sprintf('homeBundle:home:program.html.%s', $this->container->getParameter('fos_user.template.engine'));

          return $this->container->get('templating')->renderResponse($template, $data);
    }







    public function articleAction(Request $request)
    {
/** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        return $this->articleLogin(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
        ));
        // return $this->render('homeBundle:home:article.html.twig');
    }


    protected function articleLogin(array $data)
    {     $template = sprintf('homeBundle:home:article.html.%s', $this->container->getParameter('fos_user.template.engine'));

          return $this->container->get('templating')->renderResponse($template, $data);
    }









public function article1Action(Request $request)
{
/** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        return $this->article1Login(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
        ));
        // return $this->render('homeBundle:home:article.html.twig');
    }


    protected function article1Login(array $data)
    {     $template = sprintf('homeBundle:home:article1.html.%s', $this->container->getParameter('fos_user.template.engine'));

          return $this->container->get('templating')->renderResponse($template, $data);
    }

    

    public function article2Action(Request $request)
    {
/** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        return $this->article2Login(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
        ));
        // return $this->render('homeBundle:home:article.html.twig');
    }


    protected function article2Login(array $data)
    {     $template = sprintf('homeBundle:home:article2.html.%s', $this->container->getParameter('fos_user.template.engine'));

          return $this->container->get('templating')->renderResponse($template, $data);
    }
    

    








    public function loginAction()
    {
        
    }
    public function regpendaftarAction(Request $request)
    {
    	$session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        



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
            $pendaftar ->setPembayaran('Belum Lunas');
            $pendaftar ->settingkatpendidikan($form->get('tingkat')->getData());
            
            $userManager->updateUser($user);

            $pendaftar->setUserpendaftar($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($pendaftar);
            $em->flush();

            return $this->redirect($this->generateUrl('home'));
        }
        return $this->reg(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
            'form'=> $form->createView(),
        ));
        // return $this->render('homeBundle:home:daftar.html.twig',array();
    }

    protected function reg(array $data)
    {     $template = sprintf('homeBundle:home:daftar.html.%s', $this->container->getParameter('fos_user.template.engine'));

          return $this->container->get('templating')->renderResponse($template, $data);
    }
}
