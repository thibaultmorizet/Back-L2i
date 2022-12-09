<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use App\Repository\TaxeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TaxeRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => "taxe:read"],
    denormalizationContext: ['groups' => "taxe:write"]
)]

#[ApiFilter(
    NumericFilter::class,
    properties: ["tva" => "exact"]
)]
class Taxe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["book:read", "book:write", "taxe:read", "taxe:write"])]
    private ?int $id = null;

    #[ORM\Column(length:255, nullable: true)]
    #[Groups(["book:read", "book:write", "taxe:read", "taxe:write"])]
    private ?float $tva = null;

    #[ORM\OneToMany(mappedBy: 'taxe', targetEntity: Book::class, cascade: ['persist'])]
    #[Groups(["taxe:read"])]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(?float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

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
            $book->setTaxe($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getTaxe() === $this) {
                $book->setTaxe(null);
            }
        }

        return $this;
    }
}
