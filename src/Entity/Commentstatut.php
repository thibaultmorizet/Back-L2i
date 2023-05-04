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
    denormalizationContext: ['groups' => Commentstatut::COMMENTSTATUT_WRITE],
    normalizationContext: ['groups' => Commentstatut::COMMENTSTATUT_READ],
)]
#[ApiFilter(
    NumericFilter::class,
    properties: ["id" => "exact"]
)]
class Commentstatut
{
    const COMMENTSTATUT_READ = "commentstatut:read";
    const COMMENTSTATUT_WRITE = "commentstatut:write";

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Comment::COMMENT_READ, Comment::COMMENT_WRITE, Commentstatut::COMMENTSTATUT_READ, Commentstatut::COMMENTSTATUT_WRITE, User::USER_READ, User::USER_WRITE])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Comment::COMMENT_READ, Comment::COMMENT_WRITE, Commentstatut::COMMENTSTATUT_READ, Commentstatut::COMMENTSTATUT_WRITE, User::USER_READ, User::USER_WRITE])]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'comment', targetEntity: Comment::class, cascade: ['persist'])]
    #[Groups([Commentstatut::COMMENTSTATUT_READ])]
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
