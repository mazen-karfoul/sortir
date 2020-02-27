<?php

namespace App\Repository;

use App\Entity\Inscrivant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Inscrivant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inscrivant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inscrivant[]    findAll()
 * @method Inscrivant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscrivantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inscrivant::class);
    }

    // /**
    //  * @return Inscrivant[] Returns an array of Inscrivant objects
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
    public function findOneBySomeField($value): ?Inscrivant
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
