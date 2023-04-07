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

        $address2 = new Address();
        $address2->setStreet( $faker->streetName);
        $address2->setPostalcode($faker->postcode);
        $address2->setCity($faker->city);
        $address2->setCountry($faker->country);
        $manager->persist($address2);
        $this->addReference('address2', $address2);

        $address3 = new Address();
        $address3->setStreet( $faker->streetName);
        $address3->setPostalcode($faker->postcode);
        $address3->setCity($faker->city);
        $address3->setCountry($faker->country);
        $manager->persist($address3);
        $this->addReference('address3', $address3);

        $manager->flush();
    }
}
