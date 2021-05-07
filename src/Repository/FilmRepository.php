<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Film|null find($id, $lockMode = null, $lockVersion = null)
 * @method Film|null findOneBy(array $criteria, array $orderBy = null)
 * @method Film[]    findAll()
 * @method Film[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

    /**
    * @return Film[] Returns an array of Film objects
    */
    
    //Recherche par genre
    public function findByGenre()
    {
        return $this->createQueryBuilder('f')
            ->select('f.genreFilm')
            ->orderBy('f.genreFilm', 'ASC')
            ->distinct()
            ->getQuery()            
            ->getResult()
        ;
    }

    //Recherche par nationalité
    public function findByNationalite()
    {
        return $this->createQueryBuilder('f')
            ->select('f.nationaliteFilm')
            ->orderBy('f.nationaliteFilm', 'ASC')
            ->distinct()
            ->getQuery()            
            ->getResult()
        ;
    }

    //Compte nb de résultats
    public function findByCountFilm()
    {
        return $this->createQueryBuilder('f')
            ->select('count(f.id)')
            ->getQuery()            
            ->getResult()
        ;
    }

    /**
     * Fonction de recherche d'un film grâce au résultat de la barre de recherche du menu
     * @param string $query
     * @return mixed
     */
    public function findByNameSearch(string $str)
    {
        $query = $this->createQueryBuilder('f');
            //->where('nomFilm LIKE :str')
        $query->where(
                $query->expr()->andX(
                    $query->expr()->orX(
                        $query->expr()->like('f.nomFilm', ':str')
                    ),
                    $query->expr()->isNotNull('f.nomFilm')
                )
            )
            ->setParameter('str', '%' . $str . '%');

        return $query->getQuery()->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Film
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
