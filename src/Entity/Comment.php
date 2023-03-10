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
    normalizationContext: ['groups' => "comment:read"],
    denormalizationContext: ['groups' => "comment:write"],
    order: ['createdAt' => 'DESC']
)]
#[ApiFilter(
    NumericFilter::class,
    properties: ["id" => "exact","commentstatut.id" => "exact"]
)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["product:read", "product:write", "book:read", "book:write", "video:read", "video:write", "comment:read", "comment:write", "user:read", "user:write"])]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    #[Groups(["product:read", "product:write", "book:read", "book:write", "video:read", "video:write", "comment:read", "comment:write", "user:read", "user:write"])]
    #[Assert\NotBlank]
    private ?string $text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => 'CURRENT_TIMESTAMP'])]
    #[Groups(["product:read", "book:read", "video:read", "comment:read", "comment:write", "user:read"])]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["product:read", "book:read", "video:read", "comment:read", "comment:write"])]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["comment:read", "comment:write", "user:read"])]
    private ?Product $product = null;

    #[ORM\ManyToOne(inversedBy: 'comments', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["product:read", "product:write", "book:read", "book:write", "video:read", "video:write", "comment:read", "comment:write", "user:read", "user:write"])]
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
