<?php

namespace project\homeBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends BaseController
{
    public function loginAction(Request $request)
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

        return $this->renderLogin(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
        ));
        // return $this->render('homeBundle:home:home.html.twig');
    }
    public function renAction(Request $request)
    {
        if ($this->container->get('security.context')->isGranted('ROLE_MURID')) {
        return new RedirectResponse($this->container->get('router')->generate('murid'));
        
        }
      elseif ($this->container->get('security.context')->isGranted('ROLE_ADMIN')) {
         return new RedirectResponse($this->container->get('router')->generate('admin'));
      }

        return parent::loginAction($request);
    }
    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderLogin(array $data)
    {   
          //  if ($this->container->get('security.context')->isGranted('ROLE_ADMIN')==true) {
          //  $template = sprintf('adminBundle:admin:admin.html.twig', $this->container->getParameter('fos_user.template.engine'));
         
          //  }
          //  elseif ($this->container->get('security.context')->isGranted('ROLE_MURID')==true) {
          //      $template = sprintf('muridBundle:murid:murid.html.twig', $this->container->getParameter('fos_user.template.engine'));
          //  }
          //  else
          //  {
          //    $template = sprintf('FOSUserBundle:Security:login.html.%s', $this->container->getParameter('fos_user.template.engine'));

          //  }
          //  return $this->container->get('templating')->renderResponse($template, $data);
          $template = sprintf('homeBundle:home:home.html.%s', $this->container->getParameter('fos_user.template.engine'));

          return $this->container->get('templating')->renderResponse($template, $data);
    }

    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    public function logoutAction()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }
}
