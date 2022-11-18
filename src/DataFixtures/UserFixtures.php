<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Address;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    { 
       /*  $address = new Address();
        $address->setStreet('Impasse des coquelicots');
        $address->setPostalcode(84000);
        $address->setCity("Avignon");
        $address->setCountry("France");
        $manager->persist($address);

        $address2 = new Address();
        $address2->setStreet('Rue du Paradis');
        $address2->setPostalcode(13006);
        $address2->setCity("Marseille");
        $address2->setCountry("France");
        $manager->persist($address2);
        
        $user = new User();
        $user->setEmail('thibaultmorizet@icloud.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setFirstname("Thibault");
        $user->setLastname("Morizet");        
        $user->setBillingAddress($address);        
        $user->setDeliveryAddress($address);        
        $user->setPassword($this->passwordEncoder->hashPassword(
            $user,
            'Thibault14'
        ));
        $manager->persist($user);
        $user2 = new User();
        $user2->setEmail('john.wick@gmail.com');
        $user2->setFirstname("John");
        $user2->setLastname("Wick");
        $user2->setBillingAddress($address2);
        $user2->setDeliveryAddress($address2);
        $user2->setPassword($this->passwordEncoder->hashPassword(
            $user2,
            'Wick'
        ));
        $manager->persist($user2);
        $manager->flush(); */
    }
}
