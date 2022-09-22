<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $user_lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $user_firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $user_email = null;

    #[ORM\Column(length: 255)]
    private ?string $user_password = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Userstatus $user_userstatus = null;

    #[ORM\ManyToOne(inversedBy: 'users_billing')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Address $user_billing_address = null;

    #[ORM\ManyToOne(inversedBy: 'users_delivery')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Address $user_delivery_address = null;

    #[ORM\OneToMany(mappedBy: 'order_user', targetEntity: Order::class)]
    private Collection $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserLastname(): ?string
    {
        return $this->user_lastname;
    }

    public function setUserLastname(string $user_lastname): self
    {
        $this->user_lastname = $user_lastname;

        return $this;
    }

    public function getUserFirstname(): ?string
    {
        return $this->user_firstname;
    }

    public function setUserFirstname(string $user_firstname): self
    {
        $this->user_firstname = $user_firstname;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    public function getUserUserstatusFk(): ?Userstatus
    {
        return $this->user_userstatus;
    }

    public function setUserUserstatusFk(?Userstatus $user_userstatus): self
    {
        $this->user_userstatus = $user_userstatus;

        return $this;
    }

    public function getUserBillingAddress(): ?Address
    {
        return $this->user_billing_address;
    }

    public function setUserBillingAddress(?Address $user_billing_address): self
    {
        $this->user_billing_address = $user_billing_address;

        return $this;
    }

    public function getUserDeliveryAddress(): ?Address
    {
        return $this->user_delivery_address;
    }

    public function setUserDeliveryAddress(?Address $user_delivery_address): self
    {
        $this->user_delivery_address = $user_delivery_address;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setOrderUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getOrderUser() === $this) {
                $order->setOrderUser(null);
            }
        }

        return $this;
    }
}
