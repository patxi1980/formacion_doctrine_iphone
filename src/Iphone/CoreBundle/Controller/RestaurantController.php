<?php
namespace Iphone\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RestaurantController extends Controller
{
    public function topRestaurantsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $restaurantRepository = $entityManager->getRepository('Iphone\CoreBundle\Domain\Restaurant\Restaurant');

        $restaurants = $restaurantRepository->findTopRestaurants();

        return $this->render(
            'IphoneCoreBundle:Restaurant:top.html.twig',
            array('restaurants' => $restaurants)
        );
    }

    public function worstRestaurantsAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $restaurantRepository = $entityManager->getRepository('Iphone\CoreBundle\Domain\Restaurant\Restaurant');

        $restaurants = $restaurantRepository->worstRestaurantByIncidentType();

        return $this->render(
            'IphoneCoreBundle:Restaurant:worst.html.twig',
            array('restaurants' => $restaurants)
        );
    }

}
 