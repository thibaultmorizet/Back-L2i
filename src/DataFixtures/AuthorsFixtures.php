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

        $author9 = new Author();
        $author9->setLastname("Andrieu");
        $author9->setFirstname("Olivier");
        $author9->setLanguage('FR');
        $manager->persist($author9);
        $this->addReference('author9', $author9);

        $author10 = new Author();
        $author10->setLastname("Demaree");
        $author10->setFirstname("David");
        $author10->setLanguage('FR');
        $manager->persist($author10);
        $this->addReference('author10', $author10);

        $author11 = new Author();
        $author11->setLastname("Nebra");
        $author11->setFirstname("Mathieu");
        $author11->setLanguage('FR');
        $manager->persist($author11);
        $this->addReference('author11', $author11);

        $author12 = new Author();
        $author12->setLastname("Bersini");
        $author12->setFirstname("Hugues");
        $author12->setLanguage('FR');
        $manager->persist($author12);
        $this->addReference('author12', $author12);

        $author13 = new Author();
        $author13->setLastname("Hasselmann");
        $author13->setFirstname("Ken");
        $author13->setLanguage('FR');
        $manager->persist($author13);
        $this->addReference('author13', $author13);

        $author14 = new Author();
        $author14->setLastname("Saupin");
        $author14->setFirstname("Guillaume");
        $author14->setLanguage('FR');
        $manager->persist($author14);
        $this->addReference('author14', $author14);

        $author15 = new Author();
        $author15->setLastname("Hondermarck");
        $author15->setFirstname("Olivier");
        $author15->setLanguage('FR');
        $manager->persist($author15);
        $this->addReference('author15', $author15);

        $author16 = new Author();
        $author16->setLastname("Baibou");
        $author16->setFirstname("Sonia");
        $author16->setLanguage('FR');
        $manager->persist($author16);
        $this->addReference('author16', $author16);

        $author17 = new Author();
        $author17->setLastname("Eberle");
        $author17->setFirstname("Emma");
        $author17->setLanguage('FR');
        $manager->persist($author17);
        $this->addReference('author17', $author17);

        $author18 = new Author();
        $author18->setLastname("Taieb");
        $author18->setFirstname("John");
        $author18->setLanguage('FR');
        $manager->persist($author18);
        $this->addReference('author18', $author18);

        $manager->flush();
    }
}
