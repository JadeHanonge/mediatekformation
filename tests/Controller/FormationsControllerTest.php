<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class FormationsControllerTest extends WebTestCase {

    public function testFiltreFormationsDESC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/formations');
        $link = $crawler->filter('#formationDESC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(0)->text();
        $this->assertEquals('UML : Diagramme de paquetages', $firstTitle);

    }

    public function testFiltreFormationsASC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/formations');
        $link = $crawler->filter('#formationASC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(0)->text();
        $this->assertEquals("Eclipse n°1 : installation de l'IDE", $firstTitle);

    }

    public function testSearchFormation() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/formations');
        $form = $crawler->filter('#formationFiltre')->form();
        $form['recherche'] = 'Eclipse n°8 : Déploiement';
        $crawler = $client->submit($form);
        $rows = $crawler->filter('table tbody tr');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertGreaterThan(0, $rows->count(), 'Aucune formation trouvée !');
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(0)->text();
        $this->assertStringContainsString('Eclipse n°8 : Déploiement', $firstTitle, 'Le premier résultat ne correspond pas à la recherche.');
    }

    public function testFiltrePlaylistDESC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/formations');
        $link = $crawler->filter('#playlistDESC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(1)->text();
        $this->assertEquals('Eclipse et Java', $firstTitle);

    }

    public function testFiltrePlaylistASC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/formations');
        $link = $crawler->filter('#playlistASC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(1)->text();
        $this->assertEquals("Cours UML", $firstTitle);

    }

    public function testSearchPlaylist() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/formations');
        $form = $crawler->filter('#playlistFiltre')->form();
        $form['recherche'] = 'Cours UML';
        $crawler = $client->submit($form);
        $rows = $crawler->filter('table tbody tr');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertGreaterThan(0, $rows->count(), 'Aucune formation trouvée !');
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(1)->text();
        $this->assertStringContainsString('Cours UML', $firstTitle, 'Le premier résultat ne correspond pas à la recherche.');
    }

    public function testSearchCategorie() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/formations');
        $form = $crawler->filter('#categorieFiltre')->form();
        $form['recherche'] = '2';
        $crawler = $client->submit($form);
        $rows = $crawler->filter('table tbody tr');

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertGreaterThan(0, $rows->count(), 'Aucune formation trouvée !');
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(0)->text();
        $this->assertStringContainsString('UML : Diagramme de paquetages', $firstTitle, 'Le premier résultat ne correspond pas à la recherche.');
    }

    public function testFiltreDateDESC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/formations');
        $link = $crawler->filter('#dateDESC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(3)->text();
        $this->assertEquals('04/01/2021', $firstTitle);

    }

    public function testFiltreDateASC() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/formations');
        $link = $crawler->filter('#dateASC')->link();
        $crawler = $client->click($link);

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $firstTitle = $crawler->filter('table tbody tr:first-child td')->eq(3)->text();
        $this->assertEquals("01/11/2020", $firstTitle);

    }

    public function testbuttonDetail() {
        $client = static::createClient();
        $client->request('GET', '/formations');
        $client->clickLink('Titre de la formation Eclipse n°8 : Déploiement.')->link();

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $uri = $client->getRequest()->server->get("REQUEST_URL");
        $this->assertEquals('formations/formation/1', $uri);

    }

}