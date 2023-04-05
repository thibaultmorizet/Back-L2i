<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class VideosFixtures extends Fixture
{
    public function getDependencies(): array
    {
        return [BrandsFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $video1 = new Video();
        $video1->setBrand($this->getReference('marque1'));
        $video1->setTitle("Apprendre le Référencement Naturel - Formation SEO");
        $video1->setSummary("Formation SEO de l'éditeur Elephorm, présentée par Olivier Andrieu, élu meilleur référenceur naturel de France. Avec cette formation vous allez acquérir toutes les notions fondamentales pour optimiser la présence de votre site Web sur les moteurs de recherche.");
        $video1->setYear(2014);
        $video1->setImage("https://www.thibaultmorizet.fr/assets/product-images/1.jpeg");
        $video1->setUnitpriceht(69.00);
        $video1->setStock($faker->numberBetween(min: 50, max: 200));
        $manager->persist($video1);
        $this->addReference('video1', $video1);

        $metadata = $this->em->getClassMetaData(get_class($video1));
        $metadata->setIdGenerator(new \Doctrine\ORM\Id\AssignedGenerator());

        $manager->flush();
    }
}
