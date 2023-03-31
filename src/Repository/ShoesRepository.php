<?php

namespace App\Repository;

use App\Entity\Shoes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Shoes>
 *
 * @method Shoes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shoes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shoes[]    findAll()
 * @method Shoes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shoes::class);
    }

    public function save(Shoes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Shoes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return Shoes[] Returns an array of Shoes objects
    //     */
    public function findByExampleField($criteria, $orderBy = null)
    {
        $qb = $this->createQueryBuilder('s');

        if (!empty($criteria['price'])) {
            $prices = json_decode($criteria['price'], true);
            $qb
                ->andWhere('s.price >= :min')
                ->setParameter('min', $prices['min'])
                ->andWhere('s.price <= :max')
                ->setParameter('max', $prices['max']);
        };

        if (!empty($criteria['sexe'])){
            $qb 
                ->andWhere('s.sexe = :sexe')
                ->setParameter('sexe', $criteria['sexe']);
        }
        
        if (!empty($criteria['category'])){
            $qb
                ->andWhere('s.category = :category')
                ->setParameter('category', $criteria['category']);
        }


        if ($orderBy && $orderBy !== 'none') {
            $qb->orderBy('s.updatedAt', $orderBy);
        }

        return $qb
            ->getQuery()->getResult();

    }

    //    public function findOneBySomeField($value): ?Shoes
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
