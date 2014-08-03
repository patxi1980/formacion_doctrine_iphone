<?php

namespace Iphone\CoreBundle\Domain\Incident;

class Incident 
{
    private $id;

    private $incidentType;

    private $reseted;

    private $user;

    private $restaurant;

    /**
     * @return mixed
     */
    public function getIncidentType()
    {
        return $this->incidentType;
    }

    /**
     * @return mixed
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }
}
 