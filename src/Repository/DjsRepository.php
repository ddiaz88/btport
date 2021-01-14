<?php

namespace App\Repository;

use App\Entity\Djs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Djs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Djs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Djs[]    findAll()
 * @method Djs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DjsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Djs::class);
    }

    // /**
    //  * @return Djs[] Returns an array of Djs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Djs
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
