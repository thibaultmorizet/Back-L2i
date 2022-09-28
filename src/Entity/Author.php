<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["article:read"])]
    private ?string $author_firstname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["article:read"])]
    private ?string $author_lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["article:read"])]
    private ?string $author_language = null;

    #[ORM\ManyToMany(targetEntity: Article::class, mappedBy: 'article_book_author')]
    private Collection $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorFirstname(): ?string
    {
        return $this->author_firstname;
    }

    public function setAuthorFirstname(?string $author_firstname): self
    {
        $this->author_firstname = $author_firstname;

        return $this;
    }

    public function getAuthorLastname(): ?string
    {
        return $this->author_lastname;
    }

    public function setAuthorLastname(?string $author_lastname): self
    {
        $this->author_lastname = $author_lastname;

        return $this;
    }

    public function getAuthorLanguage(): ?string
    {
        return $this->author_language;
    }

    public function setAuthorLanguage(?string $author_language): self
    {
        $this->author_language = $author_language;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->addArticleBookAuthor($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            $article->removeArticleBookAuthor($this);
        }

        return $this;
    }
}
