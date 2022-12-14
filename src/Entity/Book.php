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
    properties: ['format.name' => "iexact", 'type.name' => "iexact"]
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

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'books', cascade: ['persist'])]
    #[Groups(["book:read", "book:write"])]
    private Collection $author;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'books', cascade: ['persist'])]
    #[Groups(["book:read", "book:write"])]
    private Collection $type;

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

    #[ORM\OneToMany(mappedBy: 'book', targetEntity: Book::class, cascade: ['persist'])]
    #[Groups(["book:read"])]
    private Collection $images;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->author = new ArrayCollection();
        $this->type = new ArrayCollection();
        $this->images = new ArrayCollection();
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

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setImage($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getImage() === $this) {
                $image->setImage(null);
            }
        }

        return $this;
    }

}
