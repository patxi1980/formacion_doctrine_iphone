<?php

namespace Iphone\CoreBundle\Repository\Restaurant;

use Iphone\CoreBundle\Domain\Restaurant\RestaurantRepository as RestaurantRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class RestaurantRepository extends EntityRepository implements RestaurantRepositoryInterface
{
    private function getRestaurantRepository()
    {
        $entityManager = $this->getEntityManager();

        $repository = $entityManager->getRepository('Iphone\CoreBundle\Domain\Restaurant\Restaurant');

        return $repository;
    }

    public function findTopRestaurants($limit = 20)
    {
        $repository = $this->getRestaurantRepository();

        $queryBuilder = $repository->createQueryBuilder('r');
        $queryBuilder->select([
            'r.id',
            'r.name',
            'COUNT(u.id) AS cntUsers'
        ]);
        $queryBuilder->innerJoin('r.users', 'u');

        $queryBuilder->addOrderBy('cntUsers');
        $queryBuilder->setMaxResults($limit);
        $queryBuilder->addGroupBy('u.id');

        return $queryBuilder->getQuery()->getResult();
    }

    public function worstRestaurantByIncidentType($incidentType = 2, $limit = 20)
    {
        $repository = $this->getRestaurantRepository();

        $queryBuilder = $repository->createQueryBuilder('r');
        $queryBuilder->select([
            'r.id',
            'r.name',
            'COUNT(i.id) AS cntIncidents'
        ]);
        $queryBuilder->innerJoin('r.incidents', 'i');

        $queryBuilder->andWhere('i.incidentType = :incidentType')
            ->setParameter(':incidentType', $incidentType)
            ->setMaxResults($limit);
        $queryBuilder->addOrderBy('cntIncidents', 'DESC');
        $queryBuilder->addGroupBy('r.id');

        return $queryBuilder->getQuery()->getResult();
    }


}
 