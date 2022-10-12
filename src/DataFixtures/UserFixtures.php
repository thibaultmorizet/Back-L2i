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
        $address = new Address();
        $address->setAddress_Street('Impasse des coquelicots');
        $address->setAddress_Postalcode(84000);
        $address->setAddress_City("Avignon");
        $address->setAddress_Country("France");
        $manager->persist($address);

        $address2 = new Address();
        $address2->setAddress_Street('Rue du Paradis');
        $address2->setAddress_Postalcode(13006);
        $address2->setAddress_City("Marseille");
        $address2->setAddress_Country("France");
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
        $manager->flush();
    }
}
