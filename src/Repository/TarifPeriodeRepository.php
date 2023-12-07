<?php

namespace App\Repository;

use App\Entity\TarifPeriode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TarifPeriode>
 *
 * @method TarifPeriode|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifPeriode|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifPeriode[]    findAll()
 * @method TarifPeriode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifPeriodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifPeriode::class);
    }

//    /**
//     * @return TarifPeriode[] Returns an array of TarifPeriode objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TarifPeriode
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
