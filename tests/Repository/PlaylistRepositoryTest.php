<?php

namespace App\Tests\Repository;

use App\Entity\Playlist;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PlaylistRepositoryTest extends KernelTestCase {

    public function recupRepository(): PlaylistRepository {
        self::bootKernel();
        $repository = self::getContainer()->get(PlaylistRepository::class);
        return $repository;
    }

    public function testNbFormations() {

        $repository = $this->recupRepository();
        $nbPlaylists = $repository->count([]);
        $this->assertEquals(3,$nbPlaylists);

    }

    public function newFormation(): Playlist {

        $playlist = (new Playlist())->setName("test");
        return $playlist;

    }

    public function testAddPlaylist() {

        $repository = $this->recupRepository();
        $playlist = $this->newFormation();
        $nbPlaylists = $repository->count([]);
        $repository->add($playlist, true);
        $this->assertEquals($nbPlaylists + 1, $repository->count([], "erreur lors de l'ajout"));

    }

    public function testRemovePlaylist() {

        $repository = $this->recupRepository();
        $playlist = $this->newFormation();
        $repository->add($playlist, true);
        $nbPlaylists = $repository->count([]);
        $repository->remove($playlist, true);
        $this->assertEquals($nbPlaylists - 1, $repository->count([], "erreur lors de la suppression"));

    }

    public function testFindAllOrderByName() {

        $repository = $this->recupRepository();
        $playlist = $this->newFormation();
        $repository->add($playlist, true);
        $playlists = $repository->findAllOrderByName("ASC");
        $nbPlaylists = count($playlists);
        $this->assertEquals(4, $nbPlaylists);
        $this->assertEquals("Bases de la programmation (C#)", $playlists[0]->getName());

    }

    public function testFindAllOrderByFormations() {

        $repository = $this->recupRepository();
        $playlist = $this->newFormation();
        $repository->add($playlist, true);
        $playlists = $repository->findAllOrderByFormations("ASC");
        $nbPlaylists = count($playlists);
        $this->assertEquals(4, $nbPlaylists);
        $this->assertEquals("Bases de la programmation (C#)", $playlists[0]->getName());

    }

    public function testFindByContainValue() {

        $repository = $this->recupRepository();
        $playlist = $this->newFormation();
        $repository->add($playlist, true);
        $playlists = $repository->findByContainValue("name", "Eclipse et Java");
        $nbPlaylists = count($playlists);
        $this->assertEquals(1, $nbPlaylists);
        $this->assertEquals("Eclipse et Java", $playlists[0]->getName());

    }


}