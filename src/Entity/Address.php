<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => "address:read"],
    denormalizationContext: ['groups' => "address:write"]
)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["user:read", "user:write", "address:read", "address:write", "order:read", "order:write"])]

    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:read", "user:write", "address:read", "address:write", "order:read", "order:write"])]
    private $street;

    #[ORM\Column(type: 'string', length: 10)]
    #[Groups(["user:read", "user:write", "address:read", "address:write", "order:read", "order:write"])]
    private $postalcode;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:read", "user:write", "address:read", "address:write", "order:read", "order:write"])]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:read", "user:write", "address:read", "address:write", "order:read", "order:write"])]
    private $country;

    #[ORM\OneToMany(mappedBy: 'billingAddress', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private Collection $usersBilling;

    #[ORM\OneToMany(mappedBy: 'deliveryAddress', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private Collection $usersDelivery;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsersBilling(): Collection
    {
        return $this->usersBilling;
    }

    public function addUserBilling(User $user): self
    {
        if (!$this->usersBilling->contains($user)) {
            $this->usersBilling->add($user);
            $user->setBillingAddress($this);
        }

        return $this;
    }

    public function removeUserBilling(User $user): self
    {
        if ($this->usersBilling->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->setBillingAddress() === $this) {
                $user->setBillingAddress(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsersDelivery(): Collection
    {
        return $this->usersDelivery;
    }

    public function addUserDelivery(User $user): self
    {
        if (!$this->usersDelivery->contains($user)) {
            $this->usersDelivery->add($user);
            $user->setDeliveryAddress($this);
        }

        return $this;
    }

    public function removeUserDelivery(User $user): self
    {
        if ($this->usersDelivery->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->setDeliveryAddress() === $this) {
                $user->setDeliveryAddress(null);
            }
        }

        return $this;
    }
}
