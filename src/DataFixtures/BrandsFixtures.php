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

        $marque3 = new Brand();
        $marque3->setName("Temia");
        $manager->persist($marque3);
        $this->addReference('marque3', $marque3);

        $marque4 = new Brand();
        $marque4->setName("Avanquest");
        $manager->persist($marque4);
        $this->addReference('marque4', $marque4);

        $manager->flush();
    }
}
