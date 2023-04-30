<?php

namespace App\Entity;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

const USER_READ = "user:read";
const USER_WRITE = "user:write";

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource(
    collectionOperations: [
        "get", "post"
    ],
    itemOperations: ["get", "put", "patch", "delete"],
    denormalizationContext: ['groups' => USER_WRITE],
    normalizationContext: ['groups' => USER_READ],
    paginationClientItemsPerPage: true,
    paginationItemsPerPage: 12,
)]
#[ApiFilter(
    SearchFilter::class,
    properties: ["email" => "exact", "roles" => "ipartial"]
)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups([USER_READ, USER_WRITE, ORDER_READ, ORDER_WRITE, PRODUCT_READ, BOOK_READ, VIDEO_READ, COMMENT_READ, COMMENT_WRITE])]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    #[Groups([USER_READ, USER_WRITE, ORDER_READ, ORDER_WRITE, PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, COMMENT_READ])]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    private $lastname;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    #[Groups([USER_READ, USER_WRITE, ORDER_READ, ORDER_WRITE, PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE, COMMENT_READ])]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    private $firstname;

    #[ORM\Column(type: 'string', length: 255, nullable: false, unique: true)]
    #[Groups([USER_READ, USER_WRITE, ORDER_READ, ORDER_WRITE, PRODUCT_READ, PRODUCT_WRITE, BOOK_READ, BOOK_WRITE, VIDEO_READ, VIDEO_WRITE])]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    #[Groups([USER_READ, USER_WRITE, ORDER_READ, ORDER_WRITE])]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    private $password;

    #[ORM\ManyToOne(inversedBy: 'usersBilling', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true)]
    #[Groups([USER_READ, USER_WRITE, ORDER_READ, ORDER_WRITE])]
    private ?Address $billingAddress = null;

    #[ORM\ManyToOne(inversedBy: 'usersDelivery', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true)]
    #[Groups([USER_READ, USER_WRITE, ORDER_READ, ORDER_WRITE])]
    private ?Address $deliveryAddress = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Order::class, cascade: ['persist'])]
    #[Groups([USER_READ])]
    private Collection $orders;

    #[ORM\Column(type: 'json', nullable: false)]
    #[Groups([USER_READ, USER_WRITE, PRODUCT_READ])]
    private $roles = [];

    #[ORM\Column(type: 'string', length: 2, nullable: false)]
    #[Groups([USER_READ, USER_WRITE, PRODUCT_READ])]
    private $language;

    #[ORM\Column(type: 'string', length: 1000, nullable: true)]
    #[Groups([USER_READ, USER_WRITE])]
    private $token;

    #[ORM\Column(type: 'boolean', nullable: true)]
    #[Groups([USER_READ, USER_WRITE])]
    private $forceToUpdatePassword;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Comment::class, orphanRemoval: true)]
    #[Groups([USER_READ, USER_WRITE])]
    private Collection $comments;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getForceToUpdatePassword(): ?bool
    {
        return $this->forceToUpdatePassword;
    }

    public function setForceToUpdatePassword(bool $forceToUpdatePassword): self
    {
        $this->forceToUpdatePassword = $forceToUpdatePassword;

        return $this;
    }

    /*  public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
 */
    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getDeliveryAddress(): ?Address
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress(?Address $deliveryAddress): self
    {
        $this->deliveryAddress = $deliveryAddress;

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
            $order->setUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUser() === $this) {
                $order->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /* public function getUserRoles(): array
    {
        return $this->roles;
    }

    public function setUserRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    } */

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

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
        return (string)$this->email;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }
}
