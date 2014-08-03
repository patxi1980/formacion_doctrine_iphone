<?php

namespace Iphone\CoreBundle\Repository\User;

use Iphone\CoreBundle\Domain\User\UserRepository as UserRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    private function getUserRepository()
    {
        $entityManager = $this->getEntityManager();

        $repository = $entityManager->getRepository('\Iphone\CoreBundle\Domain\User\User');

        return $repository;
    }

    public function findAll($maxResults = 20)
    {
        $repository = $this->getUserRepository();

        $queryBuilder = $repository->createQueryBuilder('u')->setMaxResults($maxResults);
        return $queryBuilder->getQuery()->getResult();
    }

    public function findByUsername($username)
    {
        $repository = $this->getUserRepository();

        $queryBuilder = $repository->createQueryBuilder('u');

        $queryBuilder
            ->andWhere($queryBuilder->expr()->like('u.username', ':username'))
            ->setParameter(':username', '%'.$username.'%')
            ->setMaxResults(1)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }


}