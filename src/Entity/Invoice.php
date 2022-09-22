<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'order_invoice', cascade: ['persist', 'remove'])]
    private ?Order $theorder = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheorder(): ?Order
    {
        return $this->theorder;
    }

    public function setTheorder(?Order $theorder): self
    {
        // unset the owning side of the relation if necessary
        if ($theorder === null && $this->theorder !== null) {
            $this->theorder->setOrderInvoice(null);
        }

        // set the owning side of the relation if necessary
        if ($theorder !== null && $theorder->getOrderInvoice() !== $this) {
            $theorder->setOrderInvoice($this);
        }

        $this->theorder = $theorder;

        return $this;
    }
}
