<?php

namespace App\Repository;

use App\Entity\Sortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }


public function selectAll() {

    $qb = $this->createQueryBuilder('s')
        ->join('s.participant','p')
        ->addSelect('p')
        ->join('s.inscrivants','ins')
        ->addSelect('ins')
        ->join('s.campus','cam')
        ->addSelect('cam')
        ->join('s.etat','et')
        ->addSelect('et')
        ->join('s.lieu','li')
        ->addSelect('li')
        ->join('li.ville','vil')
        ->addSelect('vil');

    //   ->join('s.campus','ca')
      // ->addSelect('ca')
       // ->andWhere('s.organisateur.id >= ca.id');

    $query = $qb->getQuery();
    return new Paginator($query);



}

    // /**
    //  * @return Sortie[] Returns an array of Sortie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sortie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
