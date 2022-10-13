<?php

namespace App\DataPersister;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

class BookDataPersister implements ContextAwareDataPersisterInterface
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Book;
    }

    public function persist($data, array $context = [])
    {        

        $author = $this->em->find("author", 100);
var_dump($author);
        $book = new Book();
        $book->addAuthor($author);
        
//        $this->em->merge($author);




        $this->em->persist($data);
        $this->em->flush();
    }

    public function remove($data, array $context = [])
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}
