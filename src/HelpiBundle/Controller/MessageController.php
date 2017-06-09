<?php

namespace HelpiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use HelpiBundle\Entity\Message;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;



use HelpiBundle\Entity\Thread;

class MessageController extends Controller
{
    /**
     * @Route("/message/inbox")
     *
     */
    public function customAction()
    {
        $id=$this->getUser()->getId();
        $repository = $this->getDoctrine()->getRepository('HelpiBundle:Message');
        //zamienic message na thready!
        $postsReceived = $repository->findByRecId("$id");
        $postsSent=$repository->findBySendId("$id");

        return $this->render('HelpiBundle:Message:custom.html.twig',
            array(
                'postsReceived'=>$postsReceived,
                'postsSent'    =>$postsSent));
    }
    /**
     * @Route("/message/new")
     *
     */

    public function newAction(Request $req){
        $post = new Message();
        $form = $this->createFormBuilder($post)
            ->add('recId', 'text')
            ->add('subject',"text")
            ->add('text','textarea')
            ->add('wyslij','submit')
            ->getForm();

        $form->handleRequest($req);

        if ($form->isSubmitted()) {

            $post = $form->getData();
            $username=$post->getRecId();
            $repoUser = $this->getDoctrine()->getRepository('HelpiBundle:User');
            $repoThread = $this->getDoctrine()->getRepository('HelpiBundle:Thread');

            $check=$repoUser->findByUsername("$username");
            $id=$check[0]->getId();

            $post->setRecId($id);
            $post->setSendId($this->getUser()->getId());

            $em = $this->getDoctrine()->getManager();
            //new thread
            if(($repoThread->findByCustom($post->getSubject())!==null)){
                $thread = new Thread();
                $thread->setCreatedBy($this->getUser());
                $thread->setCreatedTo($check[0]);
                $thread->setCustom($post->getSubject());
                $em->persist($thread);
            }
            //custom to temat

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('helpi_message_custom');

        }


        //if submitted
        return $this->render('HelpiBundle:Message:new.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("/message/reply/{id}/")
     *
     */
    public function replyAction(Request $req,$id){

        $repo = $this->getDoctrine()->getRepository('HelpiBundle:User');
        $user=$repo->findById("$id");

        $username=$user[0]->getUsername();


        $post = new Message();
        $form = $this->createFormBuilder($post)
            ->add('recId', 'text')
            ->add('subject',"text")
            ->add('text','textarea')
            ->add('wyslij','submit')
            ->getForm();


        $check=$req->query->get('cost');
        var_dump($check);
        //oke mam wziety getem koszt message teraz robie tak:
        //wyciagam usera, a raczej przypisuje mu coiny pomniejszone, bo juz nadole wyciaglem
        //nastepnie if ze jezeli odpisze to dodaj mu




        //jezeli istnieje thread o tym temacie
        //user po kliknieciu przycisku zrywa temat i wtedy typek dostaje hajsy a wczesniej jest walidacja ktora sprawdza czy istnieje thread
        //o podanym temacie


        $form->handleRequest($req);
        if ($form->isSubmitted()) {

            //new thread
            //primary key ID i temat!??

            $check=$req->query->get('cost');
            var_dump($check);


            $post = $form->getData();
            var_dump($post);
            $username=$post->getRecId();
            $repo = $this->getDoctrine()->getRepository('HelpiBundle:User');
            $check=$repo->findByUsername("$username");
            $id=$check[0]->getId();

            $post->setRecId($id);
            $post->setSendId($this->getUser()->getId());
            var_dump($post);
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirect('/message/inbox');

        }

        return $this->render('HelpiBundle:Message:reply.html.twig',array('form' => $form->createView(),
            'username'=>"$username"
        ));

    }




}
