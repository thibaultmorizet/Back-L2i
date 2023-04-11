<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $author1 = new Author();
        $author1->setLastname("Rimelé");
        $author1->setFirstname("Rodolphe");
        $author1->setLanguage('FR');
        $manager->persist($author1);
        $this->addReference('author1', $author1);

        $author2 = new Author();
        $author2->setLastname("Rollet");
        $author2->setFirstname("Olivier");
        $author2->setLanguage('FR');
        $manager->persist($author2);
        $this->addReference('author2', $author2);

        $author3 = new Author();
        $author3->setLastname("Martin");
        $author3->setFirstname("Robert C.");
        $author3->setLanguage('EN');
        $manager->persist($author3);
        $this->addReference('author3', $author3);

        $author4 = new Author();
        $author4->setLastname("Valade");
        $author4->setFirstname("Janet");
        $author4->setLanguage('FR');
        $manager->persist($author4);
        $this->addReference('author4', $author4);

        $author5 = new Author();
        $author5->setLastname("Anquetil");
        $author5->setFirstname("Roxane");
        $author5->setLanguage('FR');
        $manager->persist($author5);
        $this->addReference('author5', $author5);

        $author6 = new Author();
        $author6->setLastname("Dordoigne");
        $author6->setFirstname("José");
        $author6->setLanguage('FR');
        $manager->persist($author6);
        $this->addReference('author6', $author6);

        $author7 = new Author();
        $author7->setLastname("Cabantous");
        $author7->setFirstname("Pierre");
        $author7->setLanguage('FR');
        $manager->persist($author7);
        $this->addReference('author7', $author7);

        $author8 = new Author();
        $author8->setLastname("Dauzon");
        $author8->setFirstname("Samuel");
        $author8->setLanguage('FR');
        $manager->persist($author8);
        $this->addReference('author8', $author8);

        $manager->flush();
    }
}
