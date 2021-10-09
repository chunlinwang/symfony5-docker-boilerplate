<?php

namespace App\Repository;

use App\Entity\LoginStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoginStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoginStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoginStatus[]    findAll()
 * @method LoginStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoginStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoginStatus::class);
    }

    // /**
    //  * @return LoginStatus[] Returns an array of LoginStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoginStatus
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
