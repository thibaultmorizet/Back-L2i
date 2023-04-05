<?php

namespace App\DataFixtures;

use App\Entity\Taxe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TaxesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $taxe1 = new Taxe();
        $taxe1->setTva(5.5);
        $manager->persist($taxe1);
        $this->addReference('taxe1', $taxe1);

        $taxe2 = new Taxe();
        $taxe2->setTva(10.0);
        $manager->persist($taxe2);
        $this->addReference('taxe2', $taxe2);

        $manager->flush();
    }
}
