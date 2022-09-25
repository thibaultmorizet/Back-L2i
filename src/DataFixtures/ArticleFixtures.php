<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Author;
use App\Entity\Article;
use App\Entity\Editor;
use App\Entity\Format;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ArticleFixtures extends Fixture
{
    public function __construct()
    {
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        // on crée 4 auteurs avec noms et prénoms "aléatoires" en français
        $auteurs = array();
        for ($i = 0; $i < 4; $i++) {
            $auteurs[$i] = new Author();
            $auteurs[$i]->setAuthorLastname($faker->lastName);
            $auteurs[$i]->setAuthorFirstname($faker->firstName);
            $auteurs[$i]->setAuthorLanguage('FR');

            $manager->persist($auteurs[$i]);
        }
        $formats = array();

        $formats[0] = new Format();
        $formats[0]->setFormatName("Broché");
        $manager->persist($formats[0]);

        $formats[1] = new Format();
        $formats[1]->setFormatName("Poche");
        $manager->persist($formats[1]);

        $formats[2] = new Format();
        $formats[2]->setFormatName("Relié");
        $manager->persist($formats[2]);

        $formats[3] = new Format();
        $formats[3]->setFormatName("Pocket");
        $manager->persist($formats[3]);

        $editors = array();

        $editors[0] = new Editor();
        $editors[0]->setEditorName("Hachette");
        $manager->persist($editors[0]);

        $editors[1] = new Editor();
        $editors[1]->setEditorName("Albin Michel");
        $manager->persist($editors[1]);

        $editors[2] = new Editor();
        $editors[2]->setEditorName("Pocket Jeunesse");
        $manager->persist($editors[2]);

        $editors[3] = new Editor();
        $editors[3]->setEditorName("Gallimard");
        $manager->persist($editors[3]);

        // nouvelle boucle pour créer des livres

        $livres = array();

        for ($i = 0; $i < 12; $i++) {
            $livres[$i] = new Article();
            $livres[$i]->setArticleTitle($faker->sentence($nbWords = 6, $variableNbWords = true));
            $livres[$i]->setArticleSummary($faker->sentence($nbWords = 15, $variableNbWords = true));
            $livres[$i]->setArticleBookYear($faker->numberBetween($min = 1900, $max = 2020));
            $livres[$i]->setArticleUnitPrice($faker->numberBetween($min = 4, $max = 19));
            $livres[$i]->setArticleStock($faker->numberBetween($min = 10, $max = 200));
            $livres[$i]->setArticleBookIsbn("1920395869403");
            $livres[$i]->setArticleBookFormat($formats[$i % 3]);
            $livres[$i]->setArticleBookEditor($editors[$i % 3]);
            $livres[$i]->addArticleBookAuthor($auteurs[$i % 3]);

            $manager->persist($livres[$i]);
        }

        $manager->flush();
    }
}
