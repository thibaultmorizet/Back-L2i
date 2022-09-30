<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(
    paginationItemsPerPage: 9,
    paginationClientItemsPerPage: true,
    normalizationContext: ['groups' => "book:read"],
    denormalizationContext: ['groups' => "book:write"],
    order: ['book_visit_number' => 'DESC']
)]
#[ApiFilter(
    RangeFilter::class,
    properties: ['book_stock']
)]
#[ApiFilter(
    SearchFilter::class,
    properties: ['book_format.format_name' => "exact", 'book_title' => "partial", 'book_author.author_firstname' => "partial", 'book_author.author_firstname' => "partial"]
)]

class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["book:read"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["book:read"])]
    private ?string $book_title = null;

    #[ORM\Column(length: 10000, nullable: true)]
    #[Groups(["book:read"])]
    private ?string $book_summary = null;

    #[ORM\Column]
    #[Groups(["book:read"])]
    private ?float $book_unit_price = null;

    #[ORM\Column]
    #[Groups(["book:read"])]
    private ?int $book_stock = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["book:read"])]
    private ?string $book_isbn = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["book:read"])]
    private ?string $book_image = null;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'books')]
    #[Groups(["book:read"])]
    private Collection $book_author;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'books')]
    #[Groups(["book:read"])]
    private Collection $book_type;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["book:read"])]
    private ?Format $book_format = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["book:read"])]
    private ?Editor $book_editor = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["book:read"])]
    private ?string $book_year = null;

    #[ORM\Column]
    #[Groups(["book:read"])]
    private ?int $book_visit_number = null;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->book_author = new ArrayCollection();
        $this->book_type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookTitle(): ?string
    {
        return $this->book_title;
    }

    public function setBookTitle(string $book_title): self
    {
        $this->book_title = $book_title;

        return $this;
    }

    public function getBookSummary(): ?string
    {
        return $this->book_summary;
    }

    public function setBookSummary(?string $book_summary): self
    {
        $this->book_summary = $book_summary;

        return $this;
    }

    public function getBookUnitPrice(): ?float
    {
        return $this->book_unit_price;
    }

    public function setBookUnitPrice(float $book_unit_price): self
    {
        $this->book_unit_price = $book_unit_price;

        return $this;
    }

    public function getBookStock(): ?int
    {
        return $this->book_stock;
    }

    public function setBookStock(int $book_stock): self
    {
        $this->book_stock = $book_stock;

        return $this;
    }

    public function getBookIsbn(): ?string
    {
        return $this->book_isbn;
    }

    public function setBookIsbn(string $book_isbn): self
    {
        $this->book_isbn = $book_isbn;

        return $this;
    }

    public function getBookImage(): ?string
    {
        return $this->book_image;
    }

    public function setBookImage(?string $book_image): self
    {
        $this->book_image = $book_image;

        return $this;
    }

    /**
     * @return Collection<int, Author>
     */
    public function getBookAuthor(): Collection
    {
        return $this->book_author;
    }

    public function addBookAuthor(Author $bookAuthor): self
    {
        if (!$this->book_author->contains($bookAuthor)) {
            $this->book_author->add($bookAuthor);
        }

        return $this;
    }

    public function removeBookAuthor(Author $bookAuthor): self
    {
        $this->book_author->removeElement($bookAuthor);

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getBookType(): Collection
    {
        return $this->book_type;
    }

    public function addBookType(Type $bookType): self
    {
        if (!$this->book_type->contains($bookType)) {
            $this->book_type->add($bookType);
        }

        return $this;
    }

    public function removeBookType(Type $bookType): self
    {
        $this->book_type->removeElement($bookType);

        return $this;
    }

    public function getBookFormat(): ?Format
    {
        return $this->book_format;
    }

    public function setBookFormat(?Format $book_format): self
    {
        $this->book_format = $book_format;

        return $this;
    }

    public function getBookEditor(): ?Editor
    {
        return $this->book_editor;
    }

    public function setBookEditor(?Editor $book_editor): self
    {
        $this->book_editor = $book_editor;

        return $this;
    }

    public function getBookYear(): ?string
    {
        return $this->book_year;
    }

    public function setBookYear(?string $book_year): self
    {
        $this->book_year = $book_year;

        return $this;
    }

    public function getBookVisitNumber(): ?int
    {
        return $this->book_visit_number;
    }

    public function setBookVisitNumber(int $book_visit_number): self
    {
        $this->book_visit_number = $book_visit_number;

        return $this;
    }
}
