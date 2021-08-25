<?php

namespace App\Repository;

use App\Entity\SavecPosts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SavecPosts|null find($id, $lockMode = null, $lockVersion = null)
 * @method SavecPosts|null findOneBy(array $criteria, array $orderBy = null)
 * @method SavecPosts[]    findAll()
 * @method SavecPosts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SavecPostsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SavecPosts::class);
    }

    // /**
    //  * @return SavecPosts[] Returns an array of SavecPosts objects
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
    public function findOneBySomeField($value): ?SavecPosts
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
