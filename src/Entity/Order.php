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

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => "order:read"],
    denormalizationContext: ['groups' => "order:write"]
)] 
#[ApiFilter(
    NumericFilter::class,
    properties: ["user.id" => "exact"]
)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(["user:read", "user:write", "order:read", "order:write"])]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    #[Groups(["user:read", "user:write", "order:read", "order:write"])]
    private ?float $totalprice = null;

    #[ORM\Column(length: 255)]
    #[Groups(["user:read", "user:write", "order:read", "order:write"])]
    private ?string $deliveryaddress = null;

    #[ORM\Column(length: 255)]
    #[Groups(["user:read", "user:write", "order:read", "order:write"])]
    private ?string $billingaddress = null;

    #[ORM\Column(length: 10000)]
    #[Groups(["user:read", "user:write", "order:read", "order:write"])]
    private ?string $booklist = null;

    #[ORM\ManyToOne(inversedBy: 'orders', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["order:read", "order:write"])]
    private ?User $user = null;

    public function __construct()
    {
    }

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

    public function getTotalprice(): ?float
    {
        return $this->totalprice;
    }

    public function setTotalprice(float $totalprice): self
    {
        $this->totalprice = $totalprice;

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

    public function getBooklist(): array
    {
        return $this->booklist;
    }

    public function setBooklist(?array $booklist): self
    {
        $this->booklist = $booklist;

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
}
