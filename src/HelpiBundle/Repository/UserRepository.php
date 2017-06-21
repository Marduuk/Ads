<?php

namespace HelpiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use HelpiBundle\Entity\Message;
use HelpiBundle\Entity\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{


    public function getUserViaMail($mail){

       // $repoUser = $this->getRepository('HelpiBundle:User');
        $user=$this->findByEmail($mail);
        return $user[0];


    }


}