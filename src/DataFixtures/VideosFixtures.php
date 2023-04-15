<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class VideosFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [
            BrandsFixtures::class,
            AuthorsFixtures::class,
            TaxesFixtures::class
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $video1 = new Video();
        $video1->setTitle("Apprendre le Référencement Naturel - Formation SEO");
        $video1->setBrand($this->getReference('marque1'));
        $video1->setSummary("Formation SEO de l'éditeur Elephorm, présentée par Olivier Andrieu, élu meilleur référenceur naturel de France. Avec cette formation vous allez acquérir toutes les notions fondamentales pour optimiser la présence de votre site Web sur les moteurs de recherche.");
        $video1->setYear(2014);
        $video1->setImage("https://www.thibaultmorizet.fr/assets/product-images/1.jpeg");
        $video1->setUnitpriceht(65.40);
        $video1->setStock($faker->numberBetween(min: 50, max: 600));
        $video1->addAuthor($this->getReference('author9'));
        $video1->setTaxe($this->getReference('taxe1'));
        $video1->setVisitnumber($faker->numberBetween(max: 500));
        $video1->setSoldnumber($faker->numberBetween(max:$video1->getVisitnumber()));
        $manager->persist($video1);
        $this->addReference('video1', $video1);

        $video2 = new Video();
        $video2->setTitle("MySQL pour les débutants: Formation MySQL de A à Z");
        $video2->setBrand($this->getReference('marque2'));
        $video2->setSummary("
        MySQL est un systême très rapide et compact, vous pouvez donc l'exécuter avec vos autres applications sur un ordinateur portable ou de bureau. Dans ce cours, vous serez guidé à travers les bases de SQL et introduit à aux bases de données MySQL, et à la fin du cours, vous aurez une réelle capacité à créer et à superviser vos bases de données.

        Ce cours vous montrera en outre comment installer le logiciel MySQL et effectuer la configuration de base. Vous apprendrez également les requêtes de base en SQL et MySQL.

        Au long de ce cours, vous comprendrez que savoir comment fonctionnent les bases de données est un avantage considérable dans n’importe quel cheminement de carrière que vous avez choisi; que vous soyez intéressé par le marketing, la gestion de compte, la programmation ou la recherche et d'autres innombrables domaines d'études.
        
        Votre capacité à tirer parti d'une base de données à votre avantage est un outil incroyablement puissant à manier. Suivre ce cours vous rendra plus utile et pertinent pour les employeurs qui auront besoin de votre maîtrise de MySQL pour répondre à leurs besoins axés sur les données.
        
        Pourquoi choisir ce cours?
        
        Le cours vous aidera à assurer votre confiance dans la gestion de base de données MySQL en vous montrant comment optimiser les performances et les requêtes pour votre base de données. Ce cours améliorera vos compétences car il a une bonne applicabilité dans le monde de la technologie, ce qui peut différencier votre travail de la concurrence.
        
        Les progrès rapides dans le monde de la technologie peuvent également être decourageant pour quiconque souhaitant entrer dans le domaine de la technologie des bases de données, mais ce cours, vous fournissant instructions et explications étape par étape, sera un garde et une lumière au bout du tunnel pour vous.
        
        Apprenez en plus sur la façon d'ajouter des fonctionnalités et des commandes à l'environnement MySQL pour créer une meilleure cohérence des données et une sécurité suffisante pour répondre à toutes les responsabilités de tout gestionnaire de données.
        
        Vous apprendrez également des techniques et des méthodes spécifiques qui peuvent être utilisées pour maintenir les bases de données, afin de les garder sécurisées, bien organisées et rapides.
        
        Le MySQL ultime pour les débutants
        
        L'acquisition de cette compétence vous rendra indispensable en cette ère de l'information car MySQL en tant que cours est un outil très utile à avoir. Il ne nécessite pas d'expertise technique ou d'expérience avant d'apprendre à utiliser MySQL car il est destiné aux débutants
        ");
        $video2->setYear(2023);
        $video2->setImage("https://www.thibaultmorizet.fr/assets/product-images/2.jpeg");
        $video2->setUnitpriceht(18.95);
        $video2->setStock($faker->numberBetween(min: 50, max: 600));
        $video2->addAuthor($this->getReference('author17'));
        $video2->setTaxe($this->getReference('taxe1'));
        $video2->setVisitnumber($faker->numberBetween(max: 500));
        $video2->setSoldnumber($faker->numberBetween(max:$video2->getVisitnumber()));
        $manager->persist($video2);
        $this->addReference('video2', $video2);

        $manager->flush();
    }
}
