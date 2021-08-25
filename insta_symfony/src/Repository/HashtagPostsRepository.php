<?php

namespace App\Repository;

use App\Entity\HashtagPosts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HashtagPosts|null find($id, $lockMode = null, $lockVersion = null)
 * @method HashtagPosts|null findOneBy(array $criteria, array $orderBy = null)
 * @method HashtagPosts[]    findAll()
 * @method HashtagPosts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HashtagPostsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HashtagPosts::class);
    }

    // /**
    //  * @return HashtagPosts[] Returns an array of HashtagPosts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HashtagPosts
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
