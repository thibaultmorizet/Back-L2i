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
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: AuthorRepository::class)]
#[ApiResource(
    denormalizationContext: ['groups' => Author::AUTHOR_WRITE],
    normalizationContext: ['groups' => Author::AUTHOR_READ]
)]
class Author
{
    const AUTHOR_READ = "author:read";
    const AUTHOR_WRITE = "author:write";

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Author::AUTHOR_READ, Author::AUTHOR_WRITE, User::USER_READ])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Author::AUTHOR_READ, Author::AUTHOR_WRITE, User::USER_READ])]
    #[Assert\NotBlank]
    private ?string $firstname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Author::AUTHOR_READ, Author::AUTHOR_WRITE, User::USER_READ])]
    #[Assert\NotBlank]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Author::AUTHOR_READ, Author::AUTHOR_WRITE, User::USER_READ])]
    #[Assert\NotBlank]
    private ?string $language = null;

    #[ORM\ManyToMany(targetEntity: Book::class, mappedBy: 'author', cascade: ['persist'])]
    #[Groups([Author::AUTHOR_READ])]
    private Collection $books;

    #[ORM\ManyToMany(targetEntity: Video::class, mappedBy: 'author', cascade: ['persist'])]
    #[Groups([Author::AUTHOR_READ])]
    private Collection $videos;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->videos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

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
            $book->addAuthor($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            $book->removeAuthor($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->addAuthor($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            $video->removeAuthor($this);
        }

        return $this;
    }
}
