<?php



namespace HelpiBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
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

        // your own logic
    }
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    protected $mail;

    /**
     * @var float
     *
     * @ORM\Column(name="coins", type="float")
     */
    protected $coins;

    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=255)
     */
    protected $education;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string", length=255)
     */
    protected $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=1000)
     */
    protected $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="nameOfUniversity", type="string", length=255)
     */
    protected $nameOfUniversity;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfProducts", type="integer")
     */
    protected $numberOfProducts;

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

}
