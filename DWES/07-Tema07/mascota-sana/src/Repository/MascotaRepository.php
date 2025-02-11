<?php

namespace App\Repository;

use App\Entity\Mascota;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mascota>
 */
class MascotaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mascota::class);
    }

    /**
     * @return Mascota[] Devuelve un array de objetos de Mascotas
     */

    public function mascotasLetra() : array
    {
        return $this -> createQueryBuilder('m')
        -> andWhere("m.nombre like :value1 or m.nombre like :value2")
        -> setParameter("value1", "L%")
        -> setParameter("value2", "l%")
        -> getQuery()
        -> getResult();
    }
//    /**
//     * @return Mascota[] Returns an array of Mascota objects
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

//    public function findOneBySomeField($value): ?Mascota
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
