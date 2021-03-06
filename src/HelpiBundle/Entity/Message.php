<?php

namespace HelpiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="HelpiBundle\Repository\MessageRepository")
 */
class Message
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="recId", type="integer")
     */
    private $recId;

    /**
     * @var string
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="sendId", type="string", length=255)
     */
    private $sendId;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="readOrNot", type="text", length=1000)
     */
    private $readOrNot;


    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="messages")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */

    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Thread", inversedBy="messages")
     * @ORM\JoinColumn(name="thread_id", referencedColumnName="id")
     */


    private $thread;



    public function __construct(){
        $this->readOrNot=0;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set recId
     *
     * @param integer $recId
     * @return Message
     */
    public function setRecId($recId)
    {
        $this->recId = $recId;

        return $this;
    }

    /**
     * Get recId
     *
     * @return integer 
     */
    public function getRecId()
    {
        return $this->recId;
    }

    /**
     * Set sendId
     *
     * @param string $sendId
     * @return Message
     */
    public function setSendId($sendId)
    {
        $this->sendId = $sendId;

        return $this;
    }

    /**
     * Get sendId
     *
     * @return string 
     */
    public function getSendId()
    {
        return $this->sendId;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Message
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set readOrNot
     *
     * @param string $readOrNot
     * @return Message
     */
    public function setReadOrNot($readOrNot)
    {
        $this->readOrNot = $readOrNot;

        return $this;
    }

    /**
     * Get readOrNot
     *
     * @return string 
     */
    public function getReadOrNot()
    {
        return $this->readOrNot;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Message
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set product
     *
     * @param \HelpiBundle\Entity\Product $product
     * @return Message
     */
    public function setProduct(\HelpiBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \HelpiBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set thread
     *
     * @param \HelpiBundle\Entity\Thread $thread
     * @return Message
     */
    public function setThread(\HelpiBundle\Entity\Thread $thread = null)
    {
        $this->thread = $thread;

        return $this;
    }

    /**
     * Get thread
     *
     * @return \HelpiBundle\Entity\Thread 
     */
    public function getThread()
    {
        return $this->thread;
    }
}
