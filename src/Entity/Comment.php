<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ORM\Table(name: '`comment`')]
#[ApiResource(
    denormalizationContext: ['groups' => Comment::COMMENT_WRITE],
    normalizationContext: ['groups' => Comment::COMMENT_READ],
    order: ['createdAt' => 'DESC']
)]
#[ApiFilter(
    NumericFilter::class,
    properties: ["id" => "exact","commentstatut.id" => "exact"]
)]
class Comment
{
    const COMMENT_READ = "comment:read";
    const COMMENT_WRITE = "comment:write";

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Comment::COMMENT_READ, Comment::COMMENT_WRITE, User::USER_READ, User::USER_WRITE])]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Comment::COMMENT_READ, Comment::COMMENT_WRITE, User::USER_READ, User::USER_WRITE])]
    #[Assert\NotBlank]
    private ?string $text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => 'CURRENT_TIMESTAMP'])]
    #[Groups([Product::PRODUCT_READ, Book::BOOK_READ, Video::VIDEO_READ, Comment::COMMENT_READ, Comment::COMMENT_WRITE, User::USER_READ])]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([Product::PRODUCT_READ, Book::BOOK_READ, Video::VIDEO_READ, Comment::COMMENT_READ, Comment::COMMENT_WRITE])]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([Comment::COMMENT_READ, Comment::COMMENT_WRITE, User::USER_READ])]
    private ?Product $product = null;

    #[ORM\ManyToOne(inversedBy: 'comments', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Comment::COMMENT_READ, Comment::COMMENT_WRITE, User::USER_READ, User::USER_WRITE])]
    private ?Commentstatut $commentstatut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getCommentstatut(): ?Commentstatut
    {
        return $this->commentstatut;
    }

    public function setCommentstatut(?Commentstatut $commentstatut): self
    {
        $this->commentstatut = $commentstatut;

        return $this;
    }
}
