<?php

namespace App\Tests\Validations;

use App\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FormationValidationsTest extends KernelTestCase {

    public function getFormation(): Formation {
        return (new Formation())
                ->setTitle("TEST")
                ->setDescription("ceci est un test");
    }

    public function assertErrors(Formation $formation, int $nbErreursAttendues) {
        self::bootKernel();
        $validator = self::getContainer()->get(ValidatorInterface::class);
        $error = $validator->validate($formation);
        $this->assertCount($nbErreursAttendues, $error);
    }

    public function testValidDateFormation() {
        $formation = $this->getFormation()->setPublishedAt(new \DateTime("2025-01-04"));
        $this->assertErrors($formation, 0);
    }

    public function testnonValidDateFormation() {
        $formation = $this->getFormation()->setPublishedAt(new \DateTime("2026-01-04"));
        $this->assertErrors($formation, 1);
    }

}
