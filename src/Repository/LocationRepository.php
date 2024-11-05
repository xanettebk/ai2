<?php

namespace App\Repository;

use App\Entity\Location;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Location::class);
    }

    public function findOneByCityAndCountry(string $city, ?string $country): ?Location
    {
        $qb = $this->createQueryBuilder('l')
            ->andWhere('l.city = :city')
            ->setParameter('city', $city);

        if ($country) {
            $qb->andWhere('l.countryCode = :countryCode')
                ->setParameter('countryCode', $country);
        }

        return $qb->getQuery()->getOneOrNullResult();
    }
}
