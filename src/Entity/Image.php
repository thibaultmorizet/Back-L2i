<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\MongoDbOdm\Filter\NumericFilter;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[ApiResource(
    collectionOperations: [
        "get", "post"
    ],
    itemOperations: ["get", "put", "patch", "delete"],

    normalizationContext: ['groups' => "image:read"],
    denormalizationContext: ['groups' => "image:write"],
)] 
#[ApiFilter(
    NumericFilter::class,
    properties: ["book_id" => "exact"]
)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["image:read"])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["image:read", "image:write"])]
    private ?string $url = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["image:read", "image:write"])]
    private ?int $position = null;

    #[ORM\ManyToOne(inversedBy: 'images', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["image:read", "image:write"])]
    private ?Book $book = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }
    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }
}
