<?php

namespace App\Repository;

use App\Entity\YoutubeChannel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method YoutubeChannel|null find($id, $lockMode = null, $lockVersion = null)
 * @method YoutubeChannel|null findOneBy(array $criteria, array $orderBy = null)
 * @method YoutubeChannel[]    findAll()
 * @method YoutubeChannel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YoutubeChannelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, YoutubeChannel::class);
    }

//    /**
//     * @return YoutubeChannel[] Returns an array of YoutubeChannel objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('y.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?YoutubeChannel
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
