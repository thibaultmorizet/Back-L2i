<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentstatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommentstatutRepository::class)]
#[ORM\Table(name: '`commentstatut`')]
#[ApiResource(
    normalizationContext: ['groups' => "commentstatut:read"],
    denormalizationContext: ['groups' => "commentstatut:write"],
)]
#[ApiFilter(
    NumericFilter::class,
    properties: ["id" => "exact"]
)]
class Commentstatut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["product:read", "product:write","book:read", "book:write","video:read", "video:write", "comment:read", "comment:write", "commentstatut:read", "commentstatut:write", "user:read", "user:write"])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(["product:read", "product:write","book:read", "book:write","video:read", "video:write", "comment:read", "comment:write", "commentstatut:read", "commentstatut:write", "user:read", "user:write"])]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'comment', targetEntity: Comment::class, cascade: ['persist'])]
    #[Groups(["commentstatut:read"])]
    private Collection $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $comment->setCommentstatut($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getCommentstatut() === $this) {
                $comment->setCommentstatut(null);
            }
        }

        return $this;
    }
}
