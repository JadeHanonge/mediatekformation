<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PlaylistsControllerTest extends WebTestCase {

    public function testFiltreFormationsDESC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/playlists');
        $link = $crawler->filter('#formationDESC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(1)->text();
        $this->assertEquals('8', $firstTitle);

    }

    public function testFiltreFormationsASC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/playlists');
        $link = $crawler->filter('#formationASC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(1)->text();
        $this->assertEquals("0", $firstTitle);

    }


    public function testFiltrePlaylistDESC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/playlists');
        $link = $crawler->filter('#playlistDESC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(0)->text();
        $this->assertEquals('Eclipse et Java', $firstTitle);

    }

    public function testFiltrePlaylistASC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/playlists');
        $link = $crawler->filter('#playlistASC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(0)->text();
        $this->assertEquals("Bases de la programmation (C#)", $firstTitle);

    }

    public function testSearchPlaylist() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/playlists');
        $form = $crawler->filter('#playlistFiltre')->form();
        $form['recherche'] = 'Cours UML';
        $crawler = $client->submit($form);
        $rows = $crawler->filter('table tbody tr');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertGreaterThan(0, $rows->count(), 'Aucune formation trouvée !');
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(0)->text();
        $this->assertStringContainsString('Cours UML', $firstTitle, 'Le premier résultat ne correspond pas à la recherche.');
    }

    public function testSearchCategorie() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/playlists');
        $form = $crawler->filter('#categorieFiltre')->form();
        $form['recherche'] = '2';
        $crawler = $client->submit($form);
        $rows = $crawler->filter('table tbody tr');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertGreaterThan(0, $rows->count(), 'Aucune formation trouvée !');
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(0)->text();
        $this->assertStringContainsString('Cours UML', $firstTitle, 'Le premier résultat ne correspond pas à la recherche.');
    }


}