<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
#[ORM\Table(name: '`address`')]
#[ApiResource(
    collectionOperations: [
        "get", "post"
    ],
    itemOperations: ["get", "put", "patch", "delete"],
    normalizationContext: ['groups' => "address:read"],
    denormalizationContext: ['groups' => "address:write"],
)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["user:read", "user:write", "address:read", "address:write"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:read", "user:write", "address:read", "address:write"])]
    private $address_street;

    #[ORM\Column(type: 'integer')]
    #[Groups(["user:read", "user:write", "address:read", "address:write"])]
    private $address_postalcode;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:read", "user:write", "address:read", "address:write"])]
    private $address_city;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["user:read", "user:write", "address:read", "address:write"])]
    private $address_country;

    #[ORM\OneToMany(mappedBy: 'billing_address', targetEntity: User::class)]
    private Collection $users_billing;

    #[ORM\OneToMany(mappedBy: 'delivery_address', targetEntity: User::class)]
    private Collection $users_delivery;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddressStreet(): ?string
    {
        return $this->address_street;
    }

    public function setAddress_street(string $address_street): self
    {
        $this->address_street = $address_street;

        return $this;
    }

    public function getAddressPostalcode(): ?int
    {
        return $this->address_postalcode;
    }

    public function setAddress_postalcode(int $address_postalcode): self
    {
        $this->address_postalcode = $address_postalcode;

        return $this;
    }

    public function getAddressCity(): ?string
    {
        return $this->address_city;
    }

    public function setAddress_city(string $address_city): self
    {
        $this->address_city = $address_city;

        return $this;
    }

    public function getAddress_Country(): ?string
    {
        return $this->address_country;
    }

    public function setAddress_country(string $address_country): self
    {
        $this->address_country = $address_country;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsersBilling(): Collection
    {
        return $this->users_billing;
    }

    public function addUserBilling(User $user): self
    {
        if (!$this->users_billing->contains($user)) {
            $this->users_billing->add($user);
            $user->setBillingAddress($this);
        }

        return $this;
    }

    public function removeUserBilling(User $user): self
    {
        if ($this->users_billing->removeElement($user)) {
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
        return $this->users_delivery;
    }

    public function addUserDelivery(User $user): self
    {
        if (!$this->users_delivery->contains($user)) {
            $this->users_delivery->add($user);
            $user->setDeliveryAddress($this);
        }

        return $this;
    }

    public function removeUserDelivery(User $user): self
    {
        if ($this->users_delivery->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->setDeliveryAddress() === $this) {
                $user->setDeliveryAddress(null);
            }
        }

        return $this;
    }
}
