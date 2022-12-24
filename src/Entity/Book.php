<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use App\Filter\CustomMultipleSearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(
    paginationItemsPerPage: 12,
    paginationClientItemsPerPage: true,
    collectionOperations: [
        "get", "post"
    ],
    itemOperations: ["get", "put", "patch", "delete"],

    normalizationContext: ['groups' => "book:read"],
    denormalizationContext: ['groups' => "book:write"],
    order: ['soldnumber' => 'DESC', 'visitnumber' => 'DESC']
)]
#[ApiFilter(
    RangeFilter::class,
    properties: ['stock', 'unitpriceht']
)]
#[ApiFilter(
    SearchFilter::class,
    properties: ['format.name' => "iexact", 'category.name' => "iexact"]
)]
#[ApiFilter(
    CustomMultipleSearchFilter::class,
    properties: ['title' => "ipartial", 'author.firstname' => "ipartial", 'author.lastname' => "ipartial"]
)]
#[ApiFilter(OrderFilter::class, properties: ['soldnumber' => 'DESC', 'visitnumber' => 'DESC'])]

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
    private ?float $unitpriceht = null;

    #[ORM\Column]
    #[Groups(["book:read", "book:write"])]
    private ?int $stock = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["book:read", "book:write"])]
    private ?string $isbn = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["book:read", "book:write"])]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'books', cascade: ['persist'])]
    #[Groups(["book:read", "book:write"])]
    private Collection $author;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'books', cascade: ['persist'])]
    #[Groups(["book:read", "book:write"])]
    private Collection $category;

    #[ORM\ManyToOne(inversedBy: 'books', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["book:read", "book:write"])]
    private ?Format $format = null;

    #[ORM\ManyToOne(inversedBy: 'books', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["book:read", "book:write"])]
    private ?Editor $editor = null;

    #[ORM\ManyToOne(inversedBy: 'books', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["book:read", "book:write"])]
    private ?Taxe $taxe = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["book:read", "book:write"])]
    private ?string $year = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["book:read", "book:write"])]
    private ?int $visitnumber = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["book:read", "book:write"])]
    private ?int $soldnumber = null;

    #[ORM\OneToMany(mappedBy: 'book', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comments;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->author = new ArrayCollection();
        $this->category = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function getunitpriceht(): ?float
    {
        return $this->unitpriceht;
    }

    public function setunitpriceht(float $unitpriceht): self
    {
        $this->unitpriceht = $unitpriceht;

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
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $bookCategory): self
    {
        if (!$this->category->contains($bookCategory)) {
            $this->category->add($bookCategory);
        }

        return $this;
    }

    public function removeCategory(Category $bookCategory): self
    {
        $this->category->removeElement($bookCategory);

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

    public function getTaxe(): ?Taxe
    {
        return $this->taxe;
    }

    public function setTaxe(?Taxe $taxe): self
    {
        $this->taxe = $taxe;

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

    public function getSoldnumber(): ?int
    {
        return $this->soldnumber;
    }

    public function setSoldnumber(int $soldnumber): self
    {
        $this->soldnumber = $soldnumber;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setBook($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getBook() === $this) {
                $comment->setBook(null);
            }
        }

        return $this;
    }
}
