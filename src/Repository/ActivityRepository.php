<?php

namespace App\Repository;

use App\Entity\Activity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Activity>
 *
 * @method Activity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Activity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Activity[]    findAll()
 * @method Activity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activity::class);
    }

    public function add(Activity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Activity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findLikeAge(string $age)
    {
        $queryBuilder = $this->createQueryBuilder('a')
            ->join('a.ratings', 'r')
            ->addSelect('r')
            ->where('r.age LIKE :activity_age')
            ->setParameter('activity_age', '%' . $age . '%')
            ->getQuery();

        return $queryBuilder->getResult();
    }

    public function findLikeName(string $name)
    {
        $queryBuilder = $this->createQueryBuilder('a')
            ->where('a.name LIKE :activity_name')
            ->setParameter('activity_name', '%' . $name . '%')
            ->getQuery();

        return $queryBuilder->getResult();
    }

    
    public function findLikeAgeWithCity(mixed $city): mixed
    {
        $queryBuilder = $this->createQueryBuilder('a')
            ->join('a.ratings', 'r')
            //->join('r.age', 'a')
            //->addSelect('a')
            //->addSelect('c')
            //->andWhere('c LIKE :city')
            //->join('a.city', 'c')
            //->where('c LIKE :city')
            //->groupBy('r.age')
            //->where('a.city = :city')
            //->andWhere('e LIKE :age')
            //->setParameter('city', '%' . $city . '%')
            //->setParameter('age', '%' . $age . '%')
            //->orderBy('c.name', 'ASC')
            ->getQuery();

        return $queryBuilder->getResult();
    }

//    /**
//     * @return Activity[] Returns an array of Activity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Activity
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
