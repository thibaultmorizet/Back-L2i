<?php

namespace App\DataPersister;

use App\Entity\Editor;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

class EditorDataPersister implements ContextAwareDataPersisterInterface
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Editor;
    }

    public function persist($data, array $context = [])
    {        

        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data, array $context = [])
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}
