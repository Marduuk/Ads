<?php



namespace HelpiBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\MessageBundle\Model\ParticipantInterface;


/**
 * User
 * @ORM\Entity(repositoryClass="HelpiBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->products = new ArrayCollection();
        $this->numberOfProducts=0;
        $this->coins=5;

        // your own logic
    }
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     */
    protected $mail;

    /**
     * @var float
     *
     * @ORM\Column(name="coins", type="float", nullable=true)
     */
    protected $coins;

    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=255, nullable=true)
     */
    protected $education;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string", length=255, nullable=true)
     */
    protected $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=1000, nullable=true)
     */
    protected $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="nameOfUniversity", type="string", length=255, nullable=true)
     */
    protected $nameOfUniversity;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfProducts", type="integer", nullable=true)
     */
    protected $numberOfProducts;





    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="user")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $products;

    /**
     * @ORM\OneToMany(targetEntity="Thread", mappedBy="user")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */

    protected $threads;




    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set coins
     *
     * @param float $coins
     * @return User
     */
    public function setCoins($coins)
    {
        $this->coins = $coins;

        return $this;
    }

    /**
     * Get coins
     *
     * @return float 
     */
    public function getCoins()
    {
        return $this->coins;
    }

    /**
     * Set education
     *
     * @param string $education
     * @return User
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string 
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set experience
     *
     * @param string $experience
     * @return User
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return string 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return User
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set nameOfUniversity
     *
     * @param string $nameOfUniversity
     * @return User
     */
    public function setNameOfUniversity($nameOfUniversity)
    {
        $this->nameOfUniversity = $nameOfUniversity;

        return $this;
    }

    /**
     * Get nameOfUniversity
     *
     * @return string 
     */
    public function getNameOfUniversity()
    {
        return $this->nameOfUniversity;
    }

    /**
     * Set numberOfProducts
     *
     * @param integer $numberOfProducts
     * @return User
     */
    public function setNumberOfProducts($numberOfProducts)
    {
        $this->numberOfProducts = $numberOfProducts;

        return $this;
    }

    /**
     * Get numberOfProducts
     *
     * @return integer 
     */
    public function getNumberOfProducts()
    {
        return $this->numberOfProducts;
    }

    public function setEmail($email){
        parent::setEmail($email);
        parent::setUsername($email);
    }


    /**
     * Add products
     *
     * @param \HelpiBundle\Entity\Product $products
     * @return User
     */
    public function addProduct(\HelpiBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \HelpiBundle\Entity\Product $products
     */
    public function removeProduct(\HelpiBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }



    /**
     * Add threads
     *
     * @param \HelpiBundle\Entity\Thread $threads
     * @return User
     */
    public function addThread(\HelpiBundle\Entity\Thread $threads)
    {
        $this->threads[] = $threads;

        return $this;
    }

    /**
     * Remove threads
     *
     * @param \HelpiBundle\Entity\Thread $threads
     */
    public function removeThread(\HelpiBundle\Entity\Thread $threads)
    {
        $this->threads->removeElement($threads);
    }

    /**
     * Get threads
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getThreads()
    {
        return $this->threads;
    }
}
