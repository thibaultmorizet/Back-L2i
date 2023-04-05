<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category1->setName("Programmation et langages");
        $manager->persist($category1);
        $this->addReference('category1', $category1);

        $category2 = new Category();
        $category2->setName("Réseaux et télécommunication");
        $manager->persist($category2);
        $this->addReference('category2', $category2);

        $category3 = new Category();
        $category3->setName("Base de données");
        $manager->persist($category3);
        $this->addReference('category3', $category3);

        $manager->flush();
    }
}
