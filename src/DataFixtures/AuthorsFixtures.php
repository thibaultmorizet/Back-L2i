<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $auteur1 = new Author();
        $auteur1->setLastname("Rimelé");
        $auteur1->setFirstname("Rodolphe");
        $auteur1->setLanguage('FR');
        $manager->persist($auteur1);
        $this->addReference('auteur1', $auteur1);

        $auteur2 = new Author();
        $auteur2->setLastname("Rollet");
        $auteur2->setFirstname("Olivier");
        $auteur2->setLanguage('FR');
        $manager->persist($auteur2);
        $this->addReference('auteur2', $auteur2);

        $auteur3 = new Author();
        $auteur3->setLastname("Martin");
        $auteur3->setFirstname("Robert C.");
        $auteur3->setLanguage('EN');
        $manager->persist($auteur3);
        $this->addReference('auteur3', $auteur3);

        $auteur4 = new Author();
        $auteur4->setLastname("Valade");
        $auteur4->setFirstname("Janet");
        $auteur4->setLanguage('FR');
        $manager->persist($auteur4);
        $this->addReference('auteur4', $auteur4);

        $auteur5 = new Author();
        $auteur5->setLastname("Anquetil");
        $auteur5->setFirstname("Roxane");
        $auteur5->setLanguage('FR');
        $manager->persist($auteur5);
        $this->addReference('auteur5', $auteur5);

        $auteur6 = new Author();
        $auteur6->setLastname("Dordoigne");
        $auteur6->setFirstname("José");
        $auteur6->setLanguage('FR');
        $manager->persist($auteur6);
        $this->addReference('auteur6', $auteur6);

        $manager->flush();
    }
}
