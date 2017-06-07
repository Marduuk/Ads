<?php

namespace HelpiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MessageController extends Controller
{
    /**
     * @Route("/message/custom/{id}/{cost}")
     */
    public function customAction($id,$cost)
    {
        //ten do ktorego pisze
        $form = $this->container->get('fos_message.new_thread_form.factory')->create();
        $repository = $this->getDoctrine()->getRepository('HelpiBundle:User');
        $post = $repository->find($id);
        $username=$post->getUsername();
        // ten ktory pisze
  //  if(sender id!=this id) dodaj do konta cos

            $formHandler = $this->container->get('fos_message.new_thread_form.handler');

            if ($message = $formHandler->process($form)) {

                $em=$this->getDoctrine()->getManager();
                $coin=$this->getUser()->getCoins();
                $user=$this->getUser();
                $res=$coin-$cost;
                $user->setCoins($res);
                $em->persist($user);
                $em->flush();


                return new RedirectResponse($this->container->get('router')->generate('fos_message_thread_view',
                    array('threadId' => $message->getThread()->getId(),
                    )));
            }

            return $this->container->get('templating')->renderResponse('FOSMessageBundle:Message:newThread.html.twig',
                array(
                    'form' => $form->createView(),
                    'data' => $form->getData(),
                    'username' => "$username",
                ));


    }

    /**
     * @Route("/message/")
     */

    public function inboxAction()
    {
        $threads = $this->getProvider()->getInboxThreads();
        var_dump($this);


        return $this->container->get('templating')->renderResponse('FOSMessageBundle:Message:inbox.html.twig', array(
            'threads' => $threads,
        ));
    }
}
