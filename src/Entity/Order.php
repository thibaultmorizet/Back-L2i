<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(["user:read", "user:write"])]
    private ?\DateTimeInterface $order_date = null;

    #[ORM\Column]
    #[Groups(["user:read", "user:write"])]
    private ?float $order_total_price = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    #[Groups(["user:read", "user:write"])]
    private array $order_list = [];

    #[ORM\OneToOne(inversedBy: 'theorder', cascade: ['persist', 'remove'])]
    private ?Invoice $order_invoice = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $order_user = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): self
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getOrderTotalPrice(): ?float
    {
        return $this->order_total_price;
    }

    public function setOrderTotalPrice(float $order_total_price): self
    {
        $this->order_total_price = $order_total_price;

        return $this;
    }

    public function getOrderBookList(): array
    {
        return $this->order_list;
    }

    public function setOrderBookList(?array $order_list): self
    {
        $this->order_list = $order_list;

        return $this;
    }

    public function getOrderInvoice(): ?Invoice
    {
        return $this->order_invoice;
    }

    public function setOrderInvoice(?Invoice $order_invoice): self
    {
        $this->order_invoice = $order_invoice;

        return $this;
    }

    public function getOrderUser(): ?User
    {
        return $this->order_user;
    }

    public function setOrderUser(?User $order_user): self
    {
        $this->order_user = $order_user;

        return $this;
    }

}
