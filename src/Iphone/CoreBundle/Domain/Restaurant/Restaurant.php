<?php

namespace Iphone\CoreBundle\Domain\Restaurant;

class Restaurant 
{
    private $id;

    private $name;

    private $incidents;

    private $users;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
 