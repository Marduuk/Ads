<?php

namespace HelpiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="HelpiBundle\Repository\ProductRepository")
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="specialization", type="string", length=255)
     */
    private $specialization;

    /**
     * @var string
     *
     * @ORM\Column(name="fieldOfTopic", type="string", length=255)
     */
    private $fieldOfTopic;

    public function __construct() {

        $this->messages = new ArrayCollection();

    }

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="product")
     */

    private $messages;

    /**
     * @var float
     *
     * @ORM\Column(name="howMuchWorth", type="float")
     *
     *
     *
     *
     *
     *
     *
     *
     */
    private $howMuchWorth;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="products")
     */
    private $user;


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
     * Set specialization
     *
     * @param string $specialization
     * @return Product
     */
    public function setSpecialization($specialization)
    {
        $this->specialization = $specialization;

        return $this;
    }

    /**
     * Get specialization
     *
     * @return string 
     */
    public function getSpecialization()
    {
        return $this->specialization;
    }

    /**
     * Set fieldOfTopic
     *
     * @param string $fieldOfTopic
     * @return Product
     */
    public function setFieldOfTopic($fieldOfTopic)
    {
        $this->fieldOfTopic = $fieldOfTopic;

        return $this;
    }

    /**
     * Get fieldOfTopic
     *
     * @return string 
     */
    public function getFieldOfTopic()
    {
        return $this->fieldOfTopic;
    }

    /**
     * Set howMuchWorth
     *
     * @param float $howMuchWorth
     * @return Product
     *
     */
    public function setHowMuchWorth($howMuchWorth)
    {
        $this->howMuchWorth = $howMuchWorth;

        return $this;
    }

    /**
     * Get howMuchWorth
     *
     * @return float 
     */
    public function getHowMuchWorth()
    {
        return $this->howMuchWorth;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Product
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set user
     *
     * @param \HelpiBundle\Entity\User $user
     * @return Product
     */
    public function setUser(\HelpiBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \HelpiBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
   /* public function getUserId(){
        return $this->getUser()->getId();
    }*/

    /**
     * Add messages
     *
     * @param \HelpiBundle\Entity\Message $messages
     * @return Product
     */
    public function addMessage(\HelpiBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \HelpiBundle\Entity\Message $messages
     */
    public function removeMessage(\HelpiBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
