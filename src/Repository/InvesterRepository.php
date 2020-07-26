<?php

namespace App\Repository;

use App\Entity\Invester;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Invester|null find($id, $lockMode = null, $lockVersion = null)
 * @method Invester|null findOneBy(array $criteria, array $orderBy = null)
 * @method Invester[]    findAll()
 * @method Invester[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvesterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Invester::class);
    }

    // /**
    //  * @return Invester[] Returns an array of Invester objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Invester
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
