<?php

namespace MyHappy\UsuarioBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;

/**
 * Description of RegistrationController
 *
 * @author Neto
 */
class RegistrationController extends BaseController
{
     public function registroAction(Request $request, $formView = null)
    {
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);

        
        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $this->createForm($this->getFormType());
        $form->setData($user);

        $form->bind($request);
       

        if ('POST' === $request->getMethod()) {
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('index_am2');
                    $response = new RedirectResponse($url);
                }
                
                
                $em = $this->getDoctrine()->getManager();
                $funcionalidade = new Funcionalidade();
                $funcionalidade->setAtivo('false');
                $funcionalidade->setPiscadihaLimite(0);
                
                $user->setFuncionalidade($funcionalidade);
                $em->persist($funcionalidade);
                $em->persist($user);
                $em->flush();
                
                
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }

            return $this->container->get('templating')->renderResponse('MyHappyCineManiaBundle:Security:login.html.twig', array(
                        'form' => $form->createView(),
                        'error' => null
            ));
        }

        return $this->container->get('templating')->renderResponse('MyHappyCineManiaBundle:Registration:register.html.twig', array(
                    'form' => $formView ? $formView : $form->createView(),
        ));
    }

    /**
     * Nome da entidade pela qual o controlador responde
     * @return string
     */
    protected function getEntity()
    {
        return new \MyHappy\UsuarioBundle\Entity\Usuario();
    }

    protected function getFormType()
    {
        return new RegistrationFormType('MyHappy\UsuarioBundle\Entity\Usuario');
    }

    protected function getEngine()
    {
        return $this->container->getParameter('fos_user.template.engine');
    }

}
