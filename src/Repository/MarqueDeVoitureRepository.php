<?php

namespace App\Repository;

use App\Entity\MarqueDeVoiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MarqueDeVoiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method MarqueDeVoiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method MarqueDeVoiture[]    findAll()
 * @method MarqueDeVoiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarqueDeVoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MarqueDeVoiture::class);
    }

    // /**
    //  * @return MarqueDeVoiture[] Returns an array of MarqueDeVoiture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MarqueDeVoiture
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
