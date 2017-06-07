<?php

namespace HelpiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MessageController extends Controller
{
    /**
     * @Route("/message/custom")
     */
    public function customAction()
    {

            $form = $this->container->get('fos_message.new_thread_form.factory')->create();
            $id=$this->getUser();

            $formHandler = $this->container->get('fos_message.new_thread_form.handler');

            if ($message = $formHandler->process($form)) {
                return new RedirectResponse($this->container->get('router')->generate('fos_message_thread_view',
                    array('threadId' => $message->getThread()->getId(),
                    )));
            }

            return $this->container->get('templating')->renderResponse('FOSMessageBundle:Message:newThread.html.twig',
                array(
                    'form' => $form->createView(),
                    'data' => $form->getData(),
                ));


    }
}
