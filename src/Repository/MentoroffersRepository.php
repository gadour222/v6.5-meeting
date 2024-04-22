<?php

namespace App\Repository;

use App\Entity\Mentoroffers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mentoroffers>
 *
 * @method Mentoroffers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mentoroffers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mentoroffers[]    findAll()
 * @method Mentoroffers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MentoroffersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mentoroffers::class);
    }

    //    /**
    //     * @return Mentoroffers[] Returns an array of Mentoroffers objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Mentoroffers
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
