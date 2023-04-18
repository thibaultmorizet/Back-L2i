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
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

const PRODUCT_READ = "product:read";
const PRODUCT_WRITE = "product:write";

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    collectionOperations: [
        "get", "post"
    ],
    itemOperations: ["get", "put", "patch", "delete"],
    denormalizationContext: ['groups' => PRODUCT_WRITE],
    normalizationContext: ['groups' => PRODUCT_READ],

    order: ['soldnumber' => 'DESC', 'visitnumber' => 'DESC'],
    paginationClientItemsPerPage: true,
    paginationItemsPerPage: 12
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
#[InheritanceType('JOINED')]
#[DiscriminatorColumn(name: 'type', type: 'string')]
#[DiscriminatorMap(['book' => Book::class,'video' => Video::class])]

class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, COMMENT_READ, COMMENT_WRITE])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, USER_READ, USER_WRITE, COMMENT_READ, COMMENT_WRITE])]
    #[Assert\NotBlank]
    private ?string $title = null;

    #[ORM\Column(length: 10000, nullable: true)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, USER_READ, USER_WRITE])]
    #[Assert\NotBlank]
    private ?string $summary = null;

    #[ORM\Column]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, USER_READ, USER_WRITE])]
    #[Assert\NotBlank]
    private ?float $unitpriceht = null;

    #[ORM\Column]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, USER_READ, USER_WRITE])]
    #[Assert\NotBlank]
    private ?int $stock = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, USER_READ, USER_WRITE, COMMENT_READ, COMMENT_WRITE])]
    #[Assert\NotBlank]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'products', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, USER_READ, USER_WRITE])]
    private ?Taxe $taxe = null;

    #[ORM\Column(nullable: true)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, USER_READ, USER_WRITE])]
    private ?string $year = null;

    #[ORM\Column(nullable: true)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE,])]
    private ?int $visitnumber = null;

    #[ORM\Column(nullable: true)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE,])]
    private ?int $soldnumber = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Comment::class, orphanRemoval: true)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE,])]
    private Collection $comments;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'products', cascade: ['persist'])]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, VIDEO_READ, VIDEO_WRITE, BOOK_READ, BOOK_WRITE, USER_READ, USER_WRITE])]
    private Collection $category;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'products', cascade: ['persist'])]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, VIDEO_READ, VIDEO_WRITE, BOOK_READ, BOOK_WRITE, USER_READ, USER_WRITE])]
    private Collection $author;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->author = new ArrayCollection();
        $this->category = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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

}
