<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["user:read"])]
    private ?string $address_street = null;

    #[ORM\Column]
    #[Groups(["user:read"])]
    private ?int $address_postalcode = null;

    #[ORM\Column(length: 255)]
    #[Groups(["user:read"])]
    private ?string $address_city = null;

    #[ORM\Column(length: 255)]
    #[Groups(["user:read"])]
    private ?string $address_country = null;

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

    public function setAddressStreet(string $address_street): self
    {
        $this->address_street = $address_street;

        return $this;
    }

    public function getAddressPostalcode(): ?int
    {
        return $this->address_postalcode;
    }

    public function setAddressPostalcode(int $address_postalcode): self
    {
        $this->address_postalcode = $address_postalcode;

        return $this;
    }

    public function getAddressCity(): ?string
    {
        return $this->address_city;
    }

    public function setAddressCity(string $address_city): self
    {
        $this->address_city = $address_city;

        return $this;
    }

    public function getAddressCountry(): ?string
    {
        return $this->address_country;
    }

    public function setAddressCountry(string $address_country): self
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
            $user->setUserBillingAddress($this);
        }

        return $this;
    }

    public function removeUserBilling(User $user): self
    {
        if ($this->users_billing->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUserBillingAddress() === $this) {
                $user->setUserBillingAddress(null);
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
            $user->setUserDeliveryAddress($this);
        }

        return $this;
    }

    public function removeUserDelivery(User $user): self
    {
        if ($this->users_delivery->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUserDeliveryAddress() === $this) {
                $user->setUserDeliveryAddress(null);
            }
        }

        return $this;
    }
}
