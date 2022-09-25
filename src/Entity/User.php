<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements PasswordAuthenticatedUserInterface, UserInterface
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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_password = null;

    #[ORM\ManyToOne(inversedBy: 'users_billing')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Address $user_billing_address = null;

    #[ORM\ManyToOne(inversedBy: 'users_delivery')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Address $user_delivery_address = null;

    #[ORM\OneToMany(mappedBy: 'order_user', targetEntity: Order::class)]
    private Collection $orders;

    #[ORM\Column(type: 'json')]
    private $user_roles = [];

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

    /*  public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }
 */
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

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->user_password;
    }

    public function setPassword(string $password): self
    {
        $this->user_password = $password;

        return $this;
    }

    /* public function getUserRoles(): array
    {
        return $this->user_roles;
    }

    public function setUserRoles(array $user_roles): self
    {
        $this->user_roles = $user_roles;

        return $this;
    } */

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->user_roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->user_roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->user_email;
    }
}
