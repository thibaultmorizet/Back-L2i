<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\EditorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: EditorRepository::class)]
#[ApiResource(
    denormalizationContext: ['groups' => Editor::EDITOR_WRITE],
    normalizationContext: ['groups' => Editor::EDITOR_READ]
)]
#[ApiFilter(
    SearchFilter::class,
    properties: ["name" => "exact"]
)]
class Editor
{
    const EDITOR_READ = "editor:read";
    const EDITOR_WRITE = "editor:write";

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Editor::EDITOR_READ, Editor::EDITOR_WRITE, User::USER_READ])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, Editor::EDITOR_READ, Editor::EDITOR_WRITE, User::USER_READ])]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'editor', targetEntity: Book::class, cascade: ['persist'])]
    #[Groups([Editor::EDITOR_READ])]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->setEditor($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getEditor() === $this) {
                $book->setEditor(null);
            }
        }

        return $this;
    }
}
