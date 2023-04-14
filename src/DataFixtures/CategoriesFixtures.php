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

        $category4 = new Category();
        $category4->setName("Git");
        $manager->persist($category4);
        $this->addReference('category4', $category4);

        $category5 = new Category();
        $category5->setName("Python");
        $manager->persist($category5);
        $this->addReference('category5', $category5);

        $manager->flush();
    }
}
