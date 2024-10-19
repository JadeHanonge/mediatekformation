<?php

namespace App\Repository;

use App\Entity\Playlist;
use App\Interface\Constante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Playlist>
 */
class PlaylistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Playlist::class);
    }

    public function add(Playlist $entity): void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(Playlist $entity): void
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * Retourne toutes les playlists triées sur le nom de la playlist
     * @param type $champ
     * @param string $ordre
     * @return Playlist[]
     */
    public function findAllOrderByName($ordre): array{
        return $this->createQueryBuilder(Constante::P)
                ->leftjoin('p.formations', Constante::F)
                ->groupBy('p.id')
                ->orderBy('p.name', $ordre)
                ->getQuery()
                ->getResult();
    }

      /**
     * Retourne toutes les playlists triées sur le nombres de formations de la playlist
     * @param string $ordre
     * @return Playlist[]
     */
    public function findAllOrderByFormations($ordre): array{
        return $this->createQueryBuilder(Constante::P)
                ->leftjoin('p.formations', Constante::F)
                ->groupBy('p.id')
                ->orderBy('COUNT(f)', $ordre)
                ->getQuery()
                ->getResult();
    }

    /**
     * Enregistrements dont un champ contient une valeur
     * ou tous les enregistrements si la valeur est vide
     * @param type $champ
     * @param type $valeur
     * @param type $table si $champ dans une autre table
     * @return Playlist[]
     */
    public function findByContainValue($champ, $valeur, $table=""): array{
        if($valeur==""){
            return $this->findAllOrderByName(Constante::ASC);
        }
        if($table==""){
            return $this->createQueryBuilder(Constante::P)
                    ->leftjoin('p.formations', Constante::F)
                    ->where('p.'.$champ.' LIKE :valeur')
                    ->setParameter(Constante::VALEUR, '%'.$valeur.'%')
                    ->groupBy('p.id')
                    ->orderBy('p.name', Constante::ASC)
                    ->getQuery()
                    ->getResult();
        }else{
            return $this->createQueryBuilder(Constante::P)
                    ->leftjoin('p.formations', Constante::F)
                    ->leftjoin('f.categories', Constante::C)
                    ->where('c.'.$champ.' LIKE :valeur')
                    ->setParameter(Constante::VALEUR, '%'.$valeur.'%')
                    ->groupBy('p.id')
                    ->orderBy('p.name', Constante::ASC)
                    ->getQuery()
                    ->getResult();
        }
    }

}
