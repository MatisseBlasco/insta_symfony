<?php

namespace App\Repository;

use App\Entity\HashtagPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HashtagPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method HashtagPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method HashtagPost[]    findAll()
 * @method HashtagPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HashtagPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HashtagPost::class);
    }

    // /**
    //  * @return HashtagPost[] Returns an array of HashtagPost objects
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
    public function findOneBySomeField($value): ?HashtagPost
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
