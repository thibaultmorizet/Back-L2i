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
use Symfony\Component\Validator\Constraints as Assert;

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
    #[Groups(["product:read", "product:write","video:read", "video:write","book:read", "book:write", "taxe:read", "taxe:write","user:read"])]
    private ?int $id = null;

    #[ORM\Column(length:255, nullable: true)]
    #[Groups(["product:read", "product:write","video:read", "video:write","book:read", "book:write", "taxe:read", "taxe:write","user:read"])]
    #[Assert\NotBlank]
    private ?float $tva = null;

    #[ORM\OneToMany(mappedBy: 'taxe', targetEntity: Product::class, cascade: ['persist'])]
    #[Groups(["taxe:read"])]
    private Collection $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setTaxe($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getTaxe() === $this) {
                $product->setTaxe(null);
            }
        }

        return $this;
    }
}
