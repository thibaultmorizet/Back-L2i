<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Address;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private $passwordEncoder;
    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function getDependencies(): array
    {
        return [AddressFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $user = new User();
        $user->setEmail('thibaultmorizet@icloud.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setFirstname("Thibault");
        $user->setLastname("Morizet");        
        $user->setBillingAddress( $this->getReference('address1'));
        $user->setDeliveryAddress($this->getReference('address1'));
        $user->setLanguage("en");
        $user->setPassword($this->passwordEncoder->hashPassword(
            $user,
            'Thibault14*'
        ));
        $manager->persist($user);

        $user2 = new User();
        $user2->setEmail('moderator@icloud.com');
        $user2->setRoles(['ROLE_MODERATOR']);
        $user2->setFirstname($faker->firstName);
        $user2->setLastname($faker->lastName);
        $user2->setBillingAddress($this->getReference('address2'));
        $user2->setDeliveryAddress($this->getReference('address2'));
        $user2->setLanguage("en");
        $user2->setPassword($this->passwordEncoder->hashPassword(
            $user2,
            'Moderator14*'
        ));
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('user@icloud.com');
        $user3->setFirstname($faker->firstName);
        $user3->setLastname($faker->lastName);
        $user3->setBillingAddress($this->getReference('address3'));
        $user3->setDeliveryAddress($this->getReference('address3'));
        $user3->setLanguage("fr");
        $user3->setPassword($this->passwordEncoder->hashPassword(
            $user3,
            'User14*'
        ));
        $manager->persist($user3);

        $manager->flush();
    }
}
