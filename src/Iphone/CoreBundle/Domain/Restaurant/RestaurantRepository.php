<?php

namespace Iphone\CoreBundle\Domain\Restaurant;

interface RestaurantRepository 
{
    public function findTopRestaurants($limit);

    public function worstRestaurantByIncidentType($incidentType, $limit);
}
 