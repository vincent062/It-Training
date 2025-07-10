<?php

namespace App\Repository;

use App\Entity\Formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @extends ServiceEntityRepository<Formation>
 */

class FormationRepository extends ServiceEntityRepository
{
   
    public function __construct(ManagerRegistry $registry)
    {
       parent::__construct($registry, Formation::class);
    }
     
public function findAllWithSousTheme(): array
    {
        return $this->createQueryBuilder('f')
            ->addSelect('s')
            ->leftJoin('f.sousthemeParent', 's')
            ->orderBy('f.id', 'ASC')
            ->getQuery()
            ->getResult();

    }
}

//    /**
//     * @return Formation[] Returns an array of Formation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Formation
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

