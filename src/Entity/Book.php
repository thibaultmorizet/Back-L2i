<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => "book:read"],
    denormalizationContext: ['groups' => "book:write"]
)]
class Book extends Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["product:read", "product:write", "book:read", "book:write"])]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["product:read", "product:write", "user:read", "user:write"])]
    private ?string $isbn = null;

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
    
    public function __construct()
    {
        $this->author = new ArrayCollection();
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
