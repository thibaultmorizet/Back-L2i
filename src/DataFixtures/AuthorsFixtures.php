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

        $author19 = new Author();
        $author19->setLastname("Vanderstraeten");
        $author19->setFirstname("Gilles");
        $author19->setLanguage('FR');
        $manager->persist($author19);
        $this->addReference('author19', $author19);

        $author20 = new Author();
        $author20->setLastname("Leuillet");
        $author20->setFirstname("Louis Nicolas");
        $author20->setLanguage('FR');
        $manager->persist($author20);
        $this->addReference('author20', $author20);

        $author21 = new Author();
        $author21->setLastname("Williams");
        $author21->setFirstname("Trevoir");
        $author21->setLanguage('EN');
        $manager->persist($author21);
        $this->addReference('author21', $author21);

        $author22 = new Author();
        $author22->setLastname("Piatakha");
        $author22->setFirstname("Andrii");
        $author22->setLanguage('EN');
        $manager->persist($author22);
        $this->addReference('author22', $author22);

        $author23 = new Author();
        $author23->setLastname("Williams");
        $author23->setFirstname("Doron");
        $author23->setLanguage('EN');
        $manager->persist($author23);
        $this->addReference('author23', $author23);

        $author24 = new Author();
        $author24->setLastname("INSTITUTE");
        $author24->setFirstname("PROPER DOT");
        $author24->setLanguage('EN');
        $manager->persist($author24);
        $this->addReference('author24', $author24);

        $author25 = new Author();
        $author25->setLastname("Mercier");
        $author25->setFirstname("Arnaud");
        $author25->setLanguage('FR');
        $manager->persist($author25);
        $this->addReference('author25', $author25);

        $author26 = new Author();
        $author26->setLastname("Adjigble");
        $author26->setFirstname("Maxime");
        $author26->setLanguage('FR');
        $manager->persist($author26);
        $this->addReference('author26', $author26);

        $author27 = new Author();
        $author27->setLastname("Carmona");
        $author27->setFirstname("Alex");
        $author27->setLanguage('FR');
        $manager->persist($author27);
        $this->addReference('author27', $author27);

        $author28 = new Author();
        $author28->setLastname("Assouline");
        $author28->setFirstname("Jordan");
        $author28->setLanguage('FR');
        $manager->persist($author28);
        $this->addReference('author28', $author28);

        $author29 = new Author();
        $author29->setLastname("Kartner");
        $author29->setFirstname("Michel");
        $author29->setLanguage('FR');
        $manager->persist($author29);
        $this->addReference('author29', $author29);

        $manager->flush();
    }
}
