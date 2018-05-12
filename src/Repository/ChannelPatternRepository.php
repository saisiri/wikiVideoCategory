<?php

namespace App\Repository;

use App\Entity\ChannelPattern;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChannelPattern|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChannelPattern|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChannelPattern[]    findAll()
 * @method ChannelPattern[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChannelPatternRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChannelPattern::class);
    }

//    /**
//     * @return ChannelPattern[] Returns an array of ChannelPattern objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChannelPattern
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
