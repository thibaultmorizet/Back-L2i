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
        $address->setAddressStreet('Impasse des coquelicots');
        $address->setAddressPostalcode(84000);
        $address->setAddressCity("Avignon");
        $address->setAddressCountry("France");
        $manager->persist($address);

        $address2 = new Address();
        $address2->setAddressStreet('Rue du Paradis');
        $address2->setAddressPostalcode(13006);
        $address2->setAddressCity("Marseille");
        $address2->setAddressCountry("France");
        $manager->persist($address2);
        
        $user = new User();
        $user->setUserEmail('thibaultmorizet@icloud.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setUserFirstname("Thibault");
        $user->setUserLastname("Morizet");        
        $user->setUserBillingAddress($address);        
        $user->setUserDeliveryAddress($address);        
        $user->setPassword($this->passwordEncoder->hashPassword(
            $user,
            'Thibault14'
        ));
        $manager->persist($user);
        $user2 = new User();
        $user2->setUserEmail('john.wick@gmail.com');
        $user2->setUserFirstname("John");
        $user2->setUserLastname("Wick");
        $user2->setUserBillingAddress($address2);
        $user2->setUserDeliveryAddress($address2);
        $user2->setPassword($this->passwordEncoder->hashPassword(
            $user2,
            'Wick'
        ));
        $manager->persist($user2);
        $manager->flush();
    }
}
