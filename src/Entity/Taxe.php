<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use App\Repository\TaxeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TaxeRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => "taxe:read"],
    denormalizationContext: ['groups' => "taxe:write"],
    order: ['id' => 'DESC']
)]
#[ApiFilter(
    NumericFilter::class,
    properties: ["user.id" => "exact"]
)]
#[ORM\Table(name: '`taxe`')]
class Taxe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["user:read", "taxe:read"])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(["user:read", "user:write", "taxe:read", "taxe:write"])]
    private ?float $taxe = null;

    #[ORM\OneToMany(mappedBy: 'taxe', targetEntity: Book::class, cascade: ['persist'])]
    #[Groups(["taxe:read"])]
    private Collection $books;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaxe(): ?int
    {
        return $this->taxe;
    }

    public function setTaxe(int $taxe): self
    {
        $this->taxe = $taxe;

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
