<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $marque1 = new Brand();
        $marque1->setName("Elephorm");
        $manager->persist($marque1);
        $this->addReference('marque1', $marque1);

        $marque2 = new Brand();
        $marque2->setName("Udemy");
        $manager->persist($marque2);
        $this->addReference('marque2', $marque2);

        $manager->flush();
    }
}
