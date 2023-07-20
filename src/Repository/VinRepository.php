<?php

namespace App\Repository;

use App\Entity\Vin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vin>
 *
 * @method Vin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vin[]    findAll()
 * @method Vin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vin::class);
    }

    public function getTotalVinsCount(): int
    {
        return $this->createQueryBuilder('v')
            ->select('COUNT(v.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function save(Vin $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Vin $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // récupère les notes moyennes pour chaque vin
    public function averageNotesByVin(): array
    {
        $queryBuilder = $this->createQueryBuilder('v')
            ->select('v.id AS vin_id, AVG(n.note) AS averageNote')
            ->leftJoin('v.notes', 'n')
            ->groupBy('v.id')
            ->getQuery();

        return $queryBuilder->getResult();
    }

    // récupère la couleur pour chaque vin
    public function getCouleurChoices(): array
    {
        $queryBuilder = $this->createQueryBuilder('v')
            ->select('v.couleur')
            ->distinct(true)
            ->orderBy('v.couleur', 'ASC');
            $results = $queryBuilder->getQuery()->getResult();

        $choices = [];
        foreach ($results as $result) {
            $choices[$result['couleur']] = $result['couleur'];
        }

        return $choices;
    }

    public function search(array $fields): array
    {

        $queryBuilder = $this->createQueryBuilder('v');

        if ($fields['nom']) {
            $queryBuilder->andwhere('v.nom LIKE :nom')
            ->setParameter('nom', '%' . $fields['nom'] . '%')
            ->orderBy('v.nom', 'ASC');
        }

        if ($fields['millesime']) {
            $queryBuilder->andwhere('v.millesime LIKE :millesime')
            ->setParameter('millesime', '%' . $fields['millesime'] . '%');
        }

        if ($fields['couleur']) {
            $queryBuilder->andwhere('v.couleur LIKE :couleur')
            ->setParameter('couleur', '%' . $fields['couleur'] . '%');
        }

        if ($queryBuilder) {
            return $queryBuilder->getQuery()->getResult();
        }

        return $this->findAll();
    }
}
