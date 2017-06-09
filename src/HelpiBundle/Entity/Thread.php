<?php

namespace HelpiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Thread
 *
 * @ORM\Table(name="thread")
 * @ORM\Entity(repositoryClass="HelpiBundle\Repository\ThreadRepository")
 */
class Thread
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
     * @ORM\Column(name="custom", type="string", length=255)
     */
    private $custom;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="thread")
     */

    private $messsages;



    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="threads")
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id")
     */

    private $createdBy;
    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="threads")
     * @ORM\JoinColumn(name="createdTo", referencedColumnName="id")
     */
    private $createdTo;





    public function __construct() {

        $this->messages = new ArrayCollection();

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
     * Set custom
     *
     * @param string $custom
     * @return Thread
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;

        return $this;
    }

    /**
     * Get custom
     *
     * @return string 
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * Add messsages
     *
     * @param \HelpiBundle\Entity\Message $messsages
     * @return Thread
     */
    public function addMesssage(\HelpiBundle\Entity\Message $messsages)
    {
        $this->messsages[] = $messsages;

        return $this;
    }

    /**
     * Remove messsages
     *
     * @param \HelpiBundle\Entity\Message $messsages
     */
    public function removeMesssage(\HelpiBundle\Entity\Message $messsages)
    {
        $this->messsages->removeElement($messsages);
    }

    /**
     * Get messsages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesssages()
    {
        return $this->messsages;
    }

    /**
     * Set createdBy
     *
     * @param \HelpiBundle\Entity\User $createdBy
     * @return Thread
     */
    public function setCreatedBy(\HelpiBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \HelpiBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set createdTo
     *
     * @param \HelpiBundle\Entity\User $createdTo
     * @return Thread
     */
    public function setCreatedTo(\HelpiBundle\Entity\User $createdTo = null)
    {
        $this->createdTo = $createdTo;

        return $this;
    }

    /**
     * Get createdTo
     *
     * @return \HelpiBundle\Entity\User 
     */
    public function getCreatedTo()
    {
        return $this->createdTo;
    }
}
