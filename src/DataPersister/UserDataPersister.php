<?php

namespace App\DataPersister;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserDataPersister implements ContextAwareDataPersisterInterface
{
    private $em;
    private $passwordEncoder;
    public function __construct(EntityManagerInterface $em, UserPasswordHasherInterface $passwordEncoder)
    {
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof User;
    }

    public function persist($data, array $context = [])
    {
        $password = $data->getPassword();
        var_dump($password,strpos($password, "$2y$13$"),$this->passwordEncoder->hashPassword($data, $password));
        if (strpos($password, "$2y$13$") == -1) {
                $data->setPassword(
                    $this->passwordEncoder->hashPassword($data, $password)
                );
                $data->eraseCredentials();
            
        }
        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data, array $context = [])
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}
