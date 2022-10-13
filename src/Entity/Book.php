<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Filter\CustomMultipleSearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(
    paginationItemsPerPage: 9,
    paginationClientItemsPerPage: true,
    normalizationContext: ['groups' => "book:read"],
    denormalizationContext: ['groups' => "book:write"],
    order: ['visitnumber' => 'DESC']
)]
#[ApiFilter(
    RangeFilter::class,
    properties: ['stock']
)]
#[ApiFilter(
    SearchFilter::class,
    properties: ['format.name' => "iexact", 'type.name' => "iexact"]
)]
#[ApiFilter(
    CustomMultipleSearchFilter::class,
    properties: ['title' => "ipartial", 'author.firstname' => "ipartial", 'author.lastname' => "ipartial"]
)]

class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["book:read", "book:write"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["book:read", "book:write"])]
    private ?string $title = null;

    #[ORM\Column(length: 10000, nullable: true)]
    #[Groups(["book:read", "book:write"])]
    private ?string $summary = null;

    #[ORM\Column]
    #[Groups(["book:read", "book:write"])]
    private ?float $unitprice = null;

    #[ORM\Column]
    #[Groups(["book:read", "book:write"])]
    private ?int $stock = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["book:read", "book:write"])]
    private ?string $isbn = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["book:read", "book:write"])]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'books', cascade: ['persist', 'remove'])]
    #[Groups(["book:read", "book:write"])]
    private Collection $author;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'books', cascade: ['persist', 'remove'])]
    #[Groups(["book:read", "book:write"])]
    private Collection $type;

    #[ORM\ManyToOne(inversedBy: 'books', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["book:read", "book:write"])]
    private ?Format $format = null;

    #[ORM\ManyToOne(inversedBy: 'books', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["book:read", "book:write"])]
    private ?Editor $editor = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["book:read", "book:write"])]
    private ?string $year = null;

    #[ORM\Column]
    #[Groups(["book:read", "book:write"])]
    private ?int $visitnumber = null;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->author = new ArrayCollection();
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getUnitprice(): ?float
    {
        return $this->unitprice;
    }

    public function setUnitprice(float $unitprice): self
    {
        $this->unitprice = $unitprice;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Author>
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    public function addAuthor(Author $bookAuthor): self
    {
        if (!$this->author->contains($bookAuthor)) {
            $this->author->add($bookAuthor);
        }

        return $this;
    }

    public function removeAuthor(Author $bookAuthor): self
    {
        $this->author->removeElement($bookAuthor);

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Type $bookType): self
    {
        if (!$this->type->contains($bookType)) {
            $this->type->add($bookType);
        }

        return $this;
    }

    public function removeType(Type $bookType): self
    {
        $this->type->removeElement($bookType);

        return $this;
    }

    public function getFormat(): ?Format
    {
        return $this->format;
    }

    public function setFormat(?Format $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getEditor(): ?Editor
    {
        return $this->editor;
    }

    public function setEditor(?Editor $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getVisitnumber(): ?int
    {
        return $this->visitnumber;
    }

    public function setVisitnumber(int $visitnumber): self
    {
        $this->visitnumber = $visitnumber;

        return $this;
    }
}
