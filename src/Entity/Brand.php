<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: BrandRepository::class)]
#[ApiResource(
    denormalizationContext: ['groups' => Brand::BRAND_WRITE],
    normalizationContext: ['groups' => Brand::BRAND_READ]
)]
class Brand
{
    const BRAND_READ = "brand:read";
    const BRAND_WRITE = "brand:write";

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Brand::BRAND_READ, Brand::BRAND_WRITE, User::USER_READ])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([Product::PRODUCT_READ, Product::PRODUCT_WRITE, Video::VIDEO_READ, Video::VIDEO_WRITE, Brand::BRAND_READ, Brand::BRAND_WRITE, User::USER_READ])]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'brand', targetEntity: Video::class, cascade: ['persist'])]
    #[Groups([Brand::BRAND_READ])]
    private Collection $videos;

    public function __construct()
    {
        $this->videos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->setBrand($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getBrand() === $this) {
                $video->setBrand(null);
            }
        }

        return $this;
    }
}
