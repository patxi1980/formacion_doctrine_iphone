<?php

namespace Iphone\CoreBundle\Domain\User;

interface UserRepository 
{
    public function findAll();

    public function findByUsername($username);
}
 