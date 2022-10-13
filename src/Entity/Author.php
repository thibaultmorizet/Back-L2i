<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => "book:read"],
    denormalizationContext: ['groups' => "book:write"]
)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["book:read","book:write"])]
    private ?string $author_firstname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["book:read","book:write"])]
    private ?string $author_lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["book:read","book:write"])]
    private ?string $author_language = null;

    #[ORM\ManyToMany(targetEntity: Book::class, mappedBy: 'author')]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorFirstname(): ?string
    {
        return $this->author_firstname;
    }

    public function setAuthorFirstname(?string $author_firstname): self
    {
        $this->author_firstname = $author_firstname;

        return $this;
    }

    public function getAuthorLastname(): ?string
    {
        return $this->author_lastname;
    }

    public function setAuthorLastname(?string $author_lastname): self
    {
        $this->author_lastname = $author_lastname;

        return $this;
    }

    public function getAuthorLanguage(): ?string
    {
        return $this->author_language;
    }

    public function setAuthorLanguage(?string $author_language): self
    {
        $this->author_language = $author_language;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->addBookAuthor($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            $book->removeBookAuthor($this);
        }

        return $this;
    }
}
