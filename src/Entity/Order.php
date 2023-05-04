<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ApiResource(
    denormalizationContext: ['groups' => Order::ORDER_WRITE],
    normalizationContext: ['groups' => Order::ORDER_READ],
    order: ['id' => 'DESC']
)]
#[ApiFilter(
    NumericFilter::class,
    properties: ["user.id" => "exact"]
)]
#[ORM\Table(name: '`order`')]
class Order
{
    const ORDER_READ = "order:read";
    const ORDER_WRITE = "order:write";

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([User::USER_READ, Order::ORDER_READ])]

    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups([User::USER_READ, User::USER_WRITE, Order::ORDER_READ, Order::ORDER_WRITE])]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    #[Groups([User::USER_READ, User::USER_WRITE, Order::ORDER_READ, Order::ORDER_WRITE])]
    #[Assert\NotBlank]
    private ?float $totalpricettc = null;

    #[ORM\Column]
    #[Groups([User::USER_READ, User::USER_WRITE, Order::ORDER_READ, Order::ORDER_WRITE])]
    #[Assert\NotBlank]
    private ?float $totalpriceht = null;

    #[ORM\Column(length: 255)]
    #[Groups([User::USER_READ, User::USER_WRITE, Order::ORDER_READ, Order::ORDER_WRITE])]
    #[Assert\NotBlank]
    private ?string $deliveryaddress = null;

    #[ORM\Column(length: 255)]
    #[Groups([User::USER_READ, User::USER_WRITE, Order::ORDER_READ, Order::ORDER_WRITE])]
    #[Assert\NotBlank]
    private ?string $billingaddress = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    #[Groups([User::USER_READ, User::USER_WRITE, Order::ORDER_READ, Order::ORDER_WRITE])]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    private array $productlist = [];

    #[ORM\ManyToOne(inversedBy: 'orders', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([Order::ORDER_READ, Order::ORDER_WRITE])]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([User::USER_READ, User::USER_WRITE, Order::ORDER_READ, Order::ORDER_WRITE])]
    private ?string $invoicepath = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTotalpricettc(): ?float
    {
        return $this->totalpricettc;
    }

    public function setTotalpricettc(float $totalpricettc): self
    {
        $this->totalpricettc = $totalpricettc;

        return $this;
    }
    public function getTotalpriceht(): ?float
    {
        return $this->totalpriceht;
    }

    public function setTotalpriceht(float $totalpriceht): self
    {
        $this->totalpriceht = $totalpriceht;

        return $this;
    }

    public function getDeliveryaddress(): ?string
    {
        return $this->deliveryaddress;
    }

    public function setDeliveryaddress(?string $deliveryaddress): self
    {
        $this->deliveryaddress = $deliveryaddress;

        return $this;
    }

    public function getBillingaddress(): ?string
    {
        return $this->billingaddress;
    }

    public function setBillingaddress(?string $billingaddress): self
    {
        $this->billingaddress = $billingaddress;

        return $this;
    }

    public function getProductlist(): array
    {
        return $this->productlist;
    }

    public function setProductlist(?array $productlist): self
    {
        $this->productlist = $productlist;

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

    public function getInvoicepath(): ?string
    {
        return $this->invoicepath;
    }

    public function setInvoicepath(?string $invoicepath): self
    {
        $this->invoicepath = $invoicepath;

        return $this;
    }
}
