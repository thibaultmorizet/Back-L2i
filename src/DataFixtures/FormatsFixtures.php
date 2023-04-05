<?php

namespace App\DataFixtures;

use App\Entity\Format;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormatsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $format1 = new Format();
        $format1->setName("Broché");
        $manager->persist($format1);
        $this->addReference('format1', $format1);

        $format2 = new Format();
        $format2->setName("Poche");
        $manager->persist($format2);
        $this->addReference('format2', $format2);

        $manager->flush();
    }
}
