<?php

namespace App\DataFixtures;

use App\Entity\Editor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EditorsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $editor1 = new Editor();
        $editor1->setName("Blanche eyrolles");
        $manager->persist($editor1);
        $this->addReference('editor1', $editor1);

        $editor2 = new Editor();
        $editor2->setName("Éditions eni");
        $manager->persist($editor2);
        $this->addReference('editor2', $editor2);

        $editor3 = new Editor();
        $editor3->setName("Pearson");
        $manager->persist($editor3);
        $this->addReference('editor3', $editor3);

        $editor4 = new Editor();
        $editor4->setName("First Interactive");
        $manager->persist($editor4);
        $this->addReference('editor4', $editor4);

        $editor5 = new Editor();
        $editor5->setName("Anquetil Roxane");
        $manager->persist($editor5);
        $this->addReference('editor5', $editor5);

        $manager->flush();
    }
}
