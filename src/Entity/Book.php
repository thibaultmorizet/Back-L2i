<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Product;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Filter\CustomMultipleSearchFilter;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(
    denormalizationContext: ['groups' => "book:write"],
    normalizationContext: ['groups' => "book:read"],
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
class Book extends Product
{
    #[ORM\Column(nullable: true)]
    #[Groups(["product:read", "product:write", "book:read", "book:write", "user:read", "user:write"])]
    #[Assert\Isbn(
        type: Assert\Isbn::ISBN_13,
        message: 'This value is not valid.',
    )]
    #[Assert\NotBlank]
    private ?string $isbn = null;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'books', cascade: ['persist'])]
    #[Groups(["product:read", "product:write", "book:read", "book:write", "user:read", "user:write"])]
    private Collection $author;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'books', cascade: ['persist'])]
    #[Groups(["product:read", "product:write", "book:read", "book:write", "user:read", "user:write"])]
    private Collection $category;

    #[ORM\ManyToOne(inversedBy: 'books', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["product:read", "product:write", "book:read", "book:write", "user:read", "user:write"])]
    private ?Format $format = null;

    #[ORM\ManyToOne(inversedBy: 'books', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["product:read", "product:write", "book:read", "book:write", "user:read", "user:write"])]
    private ?Editor $editor = null;

    public function __construct()
    {
        $this->author = new ArrayCollection();
        $this->category = new ArrayCollection();
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
}
