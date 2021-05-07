<?php

namespace App\Repository;

use App\Entity\LigneCommandeFilm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LigneCommandeFilm|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneCommandeFilm|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneCommandeFilm[]    findAll()
 * @method LigneCommandeFilm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneCommandeFilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneCommandeFilm::class);
    }

    // /**
    //  * @return LigneCommandeFilm[] Returns an array of LigneCommandeFilm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LigneCommandeFilm
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
