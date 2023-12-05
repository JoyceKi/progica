<?php

namespace App\Repository;

use App\Entity\TarifGite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TarifGite>
 *
 * @method TarifGite|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifGite|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifGite[]    findAll()
 * @method TarifGite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifGiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifGite::class);
    }

//    /**
//     * @return TarifGite[] Returns an array of TarifGite objects
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

//    public function findOneBySomeField($value): ?TarifGite
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
