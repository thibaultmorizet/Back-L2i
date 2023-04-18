<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VideoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Product;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Filter\CustomMultipleSearchFilter;

const VIDEO_READ = "video:read";
const VIDEO_WRITE = "video:write";

#[ORM\Entity(repositoryClass: VideoRepository::class)]
#[ApiResource(
    denormalizationContext: ['groups' => VIDEO_WRITE],
    normalizationContext: ['groups' => VIDEO_READ],
    order: ['soldnumber' => 'DESC', 'visitnumber' => 'DESC'],
    paginationClientItemsPerPage: true,
    paginationItemsPerPage: 12
)]
#[ApiFilter(
    RangeFilter::class,
    properties: ['stock', 'unitpriceht']
)]
#[ApiFilter(
    SearchFilter::class,
    properties: ['brand.name' => "iexact", 'category.name' => "iexact"]
)]
#[ApiFilter(
    CustomMultipleSearchFilter::class,
    properties: ['title' => "ipartial", 'author.firstname' => "ipartial", 'author.lastname' => "ipartial"]
)]
class Video extends Product
{

    #[ORM\ManyToOne(inversedBy: 'videos', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups([PRODUCT_READ, PRODUCT_WRITE, VIDEO_READ, VIDEO_WRITE, USER_READ, USER_WRITE])]
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
