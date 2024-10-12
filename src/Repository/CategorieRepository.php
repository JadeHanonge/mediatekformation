<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Interface\Constante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorie>
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

    public function add(Categorie $entity): void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(Categorie $entity): void
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * Retourne la liste des catégories des formations d'une playlist
     * @param type $idPlaylist
     * @return array
     */
    public function findAllForOnePlaylist($idPlaylist): array{
        return $this->createQueryBuilder(Constante::C)
                ->join('c.formations', Constante::F)
                ->join('f.playlist', Constante::P)
                ->where('p.id=:id')
                ->setParameter('id', $idPlaylist)
                ->orderBy('c.name', Constante::ASC)
                ->getQuery()
                ->getResult();
    }

}
