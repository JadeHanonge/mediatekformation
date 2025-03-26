<?php

namespace App\Tests\Repository;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FormationRepositoryTest extends KernelTestCase {

    public function recupRepository(): FormationRepository {
        self::bootKernel();
        $repository = self::getContainer()->get(FormationRepository::class);
        return $repository;
    }

    public function testNbFormations() {

        $repository = $this->recupRepository();
        $nbFormations = $repository->count([]);
        $this->assertEquals(9,$nbFormations);

    }

    public function newFormation(): Formation {

        $formation = (new Formation())
                ->setTitle("TEST")
                ->setDescription("ceci est un test")
                ->setPublishedAt(new \DateTime("now"));
        return $formation;

    }

    public function testAddFormation() {

        $repository = $this->recupRepository();
        $formation = $this->newFormation();
        $nbFormations = $repository->count([]);
        $repository->add($formation, true);
        $this->assertEquals($nbFormations + 1, $repository->count([], "erreur lors de l'ajout"));

    }

    public function testRemoveFormation() {

        $repository = $this->recupRepository();
        $formation = $this->newFormation();
        $repository->add($formation, true);
        $nbFormations = $repository->count([]);
        $repository->remove($formation, true);
        $this->assertEquals($nbFormations - 1, $repository->count([], "erreur lors de la suppression"));


    }

    public function testFindAllOrderBy() {

        $repository = $this->recupRepository();
        $formation = $this->newFormation();
        $repository->add($formation, true);
        $formations = $repository->findAllOrderBy("title", "ASC");
        $nbFormations = count($formations);
        $this->assertEquals(10, $nbFormations);
        $this->assertEquals("Eclipse n°1 : installation de l'IDE", $formations[0]->getTitle());

    }

    public function testFindByContainValue() {

        $repository = $this->recupRepository();
        $formation = $this->newFormation();
        $repository->add($formation, true);
        $formations = $repository->findByContainValue("title", "Eclipse n°1");
        $nbFormations = count($formations);
        $this->assertEquals(1, $nbFormations);
        $this->assertEquals("Eclipse n°1 : installation de l'IDE", $formations[0]->getTitle());

    }

    public function testFindAllLasted() {

        $repository = $this->recupRepository();
        $formation = $this->newFormation();
        $repository->add($formation, true);
        $formations = $repository->findAllLasted(5);
        $nbFormations = count($formations);
        $this->assertEquals(5, $nbFormations);
        $this->assertLessThan($formations[0]->getPublishedAt(), $formations[1]->getPublishedAt());

    }

    public function testFindAllForOnePlaylist() {

        $repository = $this->recupRepository();
        $formation = $this->newFormation();
        $repository->add($formation, true);
        $formations = $repository->findAllForOnePlaylist(24);
        $nbFormations = count($formations);
        $this->assertEquals(1, $nbFormations);
        $this->assertEquals("UML : Diagramme de paquetages", $formations[0]->getTitle());

    }

}