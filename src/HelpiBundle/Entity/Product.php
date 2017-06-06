<?php

namespace HelpiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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

    /**
     * @var float
     *
     * @ORM\Column(name="howMuchWorth", type="float")
     */
    private $howMuchWorth;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
}