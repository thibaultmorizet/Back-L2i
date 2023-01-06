<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VideoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Product;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use App\Filter\CustomMultipleSearchFilter;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
#[ApiResource(
    paginationItemsPerPage: 12,
    paginationClientItemsPerPage: true,
    normalizationContext: ['groups' => "video:read"],
    denormalizationContext: ['groups' => "video:write"],
    order: ['soldnumber' => 'DESC', 'visitnumber' => 'DESC']
)]
#[ApiFilter(
    RangeFilter::class,
    properties: ['stock', 'unitpriceht']
)]
#[ApiFilter(
    CustomMultipleSearchFilter::class,
    properties: ['title' => "ipartial"]
)]
class Video extends Product
{
     
    #[ORM\ManyToOne(inversedBy: 'videos', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["product:read", "product:write", "video:read", "video:write", "user:read", "user:write"])]
    private ?Brand $brand = null;

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    } 
}
