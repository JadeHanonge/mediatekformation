<?php

namespace App\Repository;

use App\Entity\Formation;
use App\Interface\Constante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Formation>
 */
class FormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formation::class);
    }

    public function add(Formation $entity): void
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(Formation $entity): void
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * Retourne toutes les formations triées sur un champ
     * @param type $champ
     * @param string $ordre
     * @param type $table si $champ dans une autre table
     * @return Formation[]
     */
    public function findAllOrderBy($champ, $ordre, $table=""): array{
        if($table==""){
            return $this->createQueryBuilder(Constante::F)
                    ->orderBy('f.'.$champ, $ordre)
                    ->getQuery()
                    ->getResult();
        }else{
            return $this->createQueryBuilder(Constante::F)
                    ->join('f.'.$table, Constante::T)
                    ->orderBy('t.'.$champ, $ordre)
                    ->getQuery()
                    ->getResult();
        }
    }

    /**
     * Enregistrements dont un champ contient une valeur
     * ou tous les enregistrements si la valeur est vide
     * @param type $champ
     * @param type $valeur
     * @param type $table si $champ dans une autre table
     * @return Formation[]
     */
    public function findByContainValue($champ, $valeur, $table=""): array{
        if($valeur==""){
            return $this->findAll();
        }
        if($table==""){
            return $this->createQueryBuilder(Constante::F)
                    ->where('f.'.$champ.' LIKE :valeur')
                    ->orderBy('f.publishedAt', Constante::DESC)
                    ->setParameter(Constante::VALEUR, '%'.$valeur.'%')
                    ->getQuery()
                    ->getResult();
        }else{
            return $this->createQueryBuilder(Constante::F)
                    ->join('f.'.$table, Constante::T)
                    ->where('t.'.$champ.' LIKE :valeur')
                    ->orderBy('f.publishedAt', Constante::DESC)
                    ->setParameter(Constante::VALEUR, '%'.$valeur.'%')
                    ->getQuery()
                    ->getResult();
        }
    }

    /**
     * Retourne les n formations les plus récentes
     * @param int $nb
     * @return Formation[]
     */
    public function findAllLasted($nb) : array {
        return $this->createQueryBuilder(Constante::F)
                ->orderBy('f.publishedAt', Constante::DESC)
                ->setMaxResults($nb)
                ->getQuery()
                ->getResult();
    }

    /**
     * Retourne la liste des formations d'une playlist
     * @param type $idPlaylist
     * @return array
     */
    public function findAllForOnePlaylist($idPlaylist): array{
        return $this->createQueryBuilder(Constante::F)
                ->join('f.playlist', Constante::P)
                ->where('p.id=:id')
                ->setParameter(Constante::ID, $idPlaylist)
                ->orderBy('f.publishedAt', Constante::ASC)
                ->getQuery()
                ->getResult();
    }

}
