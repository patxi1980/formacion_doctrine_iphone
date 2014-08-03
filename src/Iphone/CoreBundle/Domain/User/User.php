<?php

namespace Iphone\CoreBundle\Domain\User;

class User 
{
    private $id;

    private $email;

    private $username;

    private $incidents;

    private $favRestaurants;

    private $friends;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getIncidents()
    {
        return $this->incidents;
    }

    /**
     * @return mixed
     */
    public function getFriends()
    {
        return $this->friends;
    }
}
 