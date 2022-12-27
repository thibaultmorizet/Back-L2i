<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use App\Filter\CustomMultipleSearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    paginationItemsPerPage: 12,
    paginationClientItemsPerPage: true,
    collectionOperations: [
        "get", "post"
    ],
    itemOperations: ["get", "put", "patch", "delete"],

    normalizationContext: ['groups' => "product:read"],
    denormalizationContext: ['groups' => "product:write"],
    order: ['soldnumber' => 'DESC', 'visitnumber' => 'DESC', 'comments.createdAt' => 'DESC']
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

class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["product:read", "product:write"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?string $title = null;

    #[ORM\Column(length: 10000, nullable: true)]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?string $summary = null;

    #[ORM\Column]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?float $unitpriceht = null;

    #[ORM\Column]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?int $stock = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?string $isbn = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'products', cascade: ['persist'])]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private Collection $author;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'products', cascade: ['persist'])]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private Collection $category;

    #[ORM\ManyToOne(inversedBy: 'products', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?Format $format = null;

    #[ORM\ManyToOne(inversedBy: 'products', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?Editor $editor = null;

    #[ORM\ManyToOne(inversedBy: 'products', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?Taxe $taxe = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?string $year = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["product:read", "product:write"])]
    private ?int $visitnumber = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["product:read", "product:write"])]
    private ?int $soldnumber = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Comment::class, orphanRemoval: true)]
    #[Groups(["product:read", "product:write"])]
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

    public function addAuthor(Author $productAuthor): self
    {
        if (!$this->author->contains($productAuthor)) {
            $this->author->add($productAuthor);
        }

        return $this;
    }

    public function removeAuthor(Author $productAuthor): self
    {
        $this->author->removeElement($productAuthor);

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $productCategory): self
    {
        if (!$this->category->contains($productCategory)) {
            $this->category->add($productCategory);
        }

        return $this;
    }

    public function removeCategory(Category $productCategory): self
    {
        $this->category->removeElement($productCategory);

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
            $comment->setProduct($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getProduct() === $this) {
                $comment->setProduct(null);
            }
        }

        return $this;
    }
}
