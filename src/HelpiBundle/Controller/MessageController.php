<?php

namespace HelpiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use HelpiBundle\Entity\Message;
use HelpiBundle\Entity\User;

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
        $message = new Message();
        $form = $this->createForm('HelpiBundle\Form\MessageType', $message);

        $form->handleRequest($req);
        if ($form->isSubmitted()) {
            $post = $form->getData();
            $mail=$post->getRecId();
            $mailUserGetter=$this->get('helpi_bundle.entity.repository_user');
            $user=$mailUserGetter->getUserViaMail($mail);

            $repoThread = $this->getDoctrine()->getRepository('HelpiBundle:Thread');
            $em = $this->getDoctrine()->getManager();

            $post->setRecId($user->getId());
            $post->setSendId($this->getUser()->getId());
// ustawic id threada? ogolnie odnosnik do threada
            //new thread
            if(false){
               // $repoThread->findByCustom($post->getSubject()))==null){// i do tego miedzy tymi userami i z data oooo! Datetime i sprawdzamy czy minely od zalozenia 2 dni jezeli tak to cos tam sie dzieje
                //w do konstruktura thread wsadzic te parametry
                //a do konstruktora message thread? jezeli nie istnieje taki thread ALBO i teraz uwazaj!
                // JEZELI OD TERMINU !!!POWSTANIA!!! thread nie minely 2 dni
                //gdzies musze zwalidowac czy ta wiadomosc nalezy do tego threada
                $thread = new Thread();
                $thread->setCreatedBy($this->getUser());
                $thread->setCreatedTo($user);//!!!
                $thread->setCustom($post->getSubject());
                $em->persist($thread);
                $post->setThread($thread);
            }
            else{
                var_dump($post->getSubject());
                var_dump($repoThread->findByCustom($post->getSubject()));

die();
                $post->setThread($repoThread->findByCustom($post->getSubject()));
            }

            $em = $this->getDoctrine()->getManager();
            var_dump($post);
            die();
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
            $em=$this->get('helpi.entity.repository_message');
            $em->save($post);



            return $this->redirect('/message/inbox');

        }

        return $this->render('HelpiBundle:Message:reply.html.twig',array('form' => $form->createView(),
            'username'=>"$username"
        ));

    }




}
