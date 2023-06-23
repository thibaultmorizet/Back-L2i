<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AddressFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $address1 = new Address();
        $address1->setStreet('Impasse des coquelicots');
        $address1->setPostalcode(84000);
        $address1->setCity("Avignon");
        $address1->setCountry("France");
        $manager->persist($address1);
        $this->addReference('address1', $address1);
        $manager->persist($address1);
        $this->addReference('address2', $address1);

        $address3 = new Address();
        $address3->setStreet($faker->streetName);
        $address3->setPostalcode($faker->postcode);
        $address3->setCity($faker->city);
        $address3->setCountry("France");
        $manager->persist($address3);
        $this->addReference('address3', $address3);
        $manager->persist($address3);
        $this->addReference('address4', $address3);

        $address5 = new Address();
        $address5->setStreet($faker->streetName);
        $address5->setPostalcode($faker->postcode);
        $address5->setCity($faker->city);
        $address5->setCountry("France");
        $manager->persist($address5);
        $this->addReference('address5', $address5);
        $manager->persist($address5);
        $this->addReference('address6', $address5);

        $manager->flush();
    }
}
