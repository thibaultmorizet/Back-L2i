<?php

namespace App\Entity;

use App\Repository\UserstatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserstatusRepository::class)]
class Userstatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $userstatus_name = null;

    #[ORM\OneToMany(mappedBy: 'user_userstatus', targetEntity: User::class)]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserstatusName(): ?string
    {
        return $this->userstatus_name;
    }

    public function setUserstatusName(string $userstatus_name): self
    {
        $this->userstatus_name = $userstatus_name;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setUserUserstatusFk($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUserUserstatusFk() === $this) {
                $user->setUserUserstatusFk(null);
            }
        }

        return $this;
    }
}
