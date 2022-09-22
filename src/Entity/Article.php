<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $article_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $article_summary = null;

    #[ORM\Column]
    private ?float $article_unit_price = null;

    #[ORM\Column]
    private ?int $article_stock = null;

    #[ORM\Column(nullable: true)]
    private ?int $article_book_isbn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $article_book_image = null;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'articles')]
    private Collection $article_book_author;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'articles')]
    private Collection $article_book_type;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Format $article_book_format = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Editor $article_book_editor = null;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->article_book_author = new ArrayCollection();
        $this->article_book_type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }

    public function setArticleTitle(string $article_title): self
    {
        $this->article_title = $article_title;

        return $this;
    }

    public function getArticleSummary(): ?string
    {
        return $this->article_summary;
    }

    public function setArticleSummary(?string $article_summary): self
    {
        $this->article_summary = $article_summary;

        return $this;
    }

    public function getArticleUnitPrice(): ?float
    {
        return $this->article_unit_price;
    }

    public function setArticleUnitPrice(float $article_unit_price): self
    {
        $this->article_unit_price = $article_unit_price;

        return $this;
    }

    public function getArticleStock(): ?int
    {
        return $this->article_stock;
    }

    public function setArticleStock(int $article_stock): self
    {
        $this->article_stock = $article_stock;

        return $this;
    }

    public function getArticleBookIsbn(): ?int
    {
        return $this->article_book_isbn;
    }

    public function setArticleBookIsbn(int $article_book_isbn): self
    {
        $this->article_book_isbn = $article_book_isbn;

        return $this;
    }

    public function getArticleBookImage(): ?string
    {
        return $this->article_book_image;
    }

    public function setArticleBookImage(?string $article_book_image): self
    {
        $this->article_book_image = $article_book_image;

        return $this;
    }

    /**
     * @return Collection<int, Author>
     */
    public function getArticleBookAuthor(): Collection
    {
        return $this->article_book_author;
    }

    public function addArticleBookAuthor(Author $articleBookAuthor): self
    {
        if (!$this->article_book_author->contains($articleBookAuthor)) {
            $this->article_book_author->add($articleBookAuthor);
        }

        return $this;
    }

    public function removeArticleBookAuthor(Author $articleBookAuthor): self
    {
        $this->article_book_author->removeElement($articleBookAuthor);

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getArticleBookType(): Collection
    {
        return $this->article_book_type;
    }

    public function addArticleBookType(Type $articleBookType): self
    {
        if (!$this->article_book_type->contains($articleBookType)) {
            $this->article_book_type->add($articleBookType);
        }

        return $this;
    }

    public function removeArticleBookType(Type $articleBookType): self
    {
        $this->article_book_type->removeElement($articleBookType);

        return $this;
    }

    public function getArticleBookFormat(): ?Format
    {
        return $this->article_book_format;
    }

    public function setArticleBookFormat(?Format $article_book_format): self
    {
        $this->article_book_format = $article_book_format;

        return $this;
    }

    public function getArticleBookEditor(): ?Editor
    {
        return $this->article_book_editor;
    }

    public function setArticleBookEditor(?Editor $article_book_editor): self
    {
        $this->article_book_editor = $article_book_editor;

        return $this;
    }
}