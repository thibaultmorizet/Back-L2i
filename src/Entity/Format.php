<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\FormatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

const FORMAT_READ = "format:read";
const FORMAT_WRITE = "format:write";

#[ORM\Entity(repositoryClass: FormatRepository::class)]
#[ApiResource(
    denormalizationContext: ['groups' => FORMAT_WRITE],
    normalizationContext: ['groups' => FORMAT_READ]
)]

#[ApiFilter(
    SearchFilter::class,
    properties: ["name" => "exact"]
)]
class Format
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, FORMAT_READ, FORMAT_WRITE, USER_READ])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, FORMAT_READ, FORMAT_WRITE, USER_READ])]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'format', targetEntity: Book::class, cascade: ['persist'])]
    #[Groups([FORMAT_READ])]
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
            $book->setFormat($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getFormat() === $this) {
                $book->setFormat(null);
            }
        }

        return $this;
    }
}
