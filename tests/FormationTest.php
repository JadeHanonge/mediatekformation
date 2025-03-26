<?php

namespace App\Tests;

use App\Entity\Formation;
use PHPUnit\Framework\TestCase;

class FormationTest extends TestCase {

    public function testGetPublishedAtString() {
        $formation = new Formation();
        $formation->setPublishedAt(new \DateTime("2025-01-04"));
        $this->assertEquals("04/01/2025", $formation->getPublishedAtString());
    }

}