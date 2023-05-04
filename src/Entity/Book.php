<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Product;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Filter\CustomMultipleSearchFilter;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(
    denormalizationContext: ['groups' => Book::BOOK_WRITE],
    normalizationContext: ['groups' => Book::BOOK_READ],
    order: ['soldnumber' => 'DESC', 'visitnumber' => 'DESC'],
    paginationClientItemsPerPage: true,
    paginationItemsPerPage: 12
)]
#[ApiFilter(
    RangeFilter::class,
    properties: ['stock', 'unitpriceht']
)]
#[ApiFilter(
    SearchFilter::class,
    properties: ['format.name' => "iexact", 'category.name' => "iexact"]
)]
#[ApiFilter(
    CustomMultipleSearchFilter::class,
    properties: ['title' => "ipartial", 'author.firstname' => "ipartial", 'author.lastname' => "ipartial"]
)]
class Book extends Product
{
    const BOOK_READ = "book:read";
    const BOOK_WRITE = "book:write";
    #[ORM\Column(nullable: true)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, User::USER_READ, User::USER_WRITE])]
    #[Assert\Isbn(
        type: Assert\Isbn::ISBN_13,
        message: 'This value is not valid.',
    )]
    #[Assert\NotBlank]
    private ?string $isbn = null;

    #[ORM\ManyToOne(inversedBy: 'books', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, User::USER_READ, User::USER_WRITE])]
    private ?Format $format = null;

    #[ORM\ManyToOne(inversedBy: 'books', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Book::BOOK_READ, Book::BOOK_WRITE, User::USER_READ, User::USER_WRITE])]
    private ?Editor $editor = null;

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }


    public function getFormat(): ?Format
    {
        return $this->format;
    }

    public function setFormat(?Format $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getEditor(): ?Editor
    {
        return $this->editor;
    }

    public function setEditor(?Editor $editor): self
    {
        $this->editor = $editor;

        return $this;
    }
}
