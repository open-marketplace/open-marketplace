<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder implements OrderInterface
{
    private ?VendorInterface $vendor;

    private ?OrderInterface $primaryOrder;

    /** @var ?Collection<int, OrderInterface> */
    private ?Collection $subOrders;

    public function __construct()
    {
        parent::__construct();
        $this->subOrders = new ArrayCollection();
    }
    public function getVendor(): ?VendorInterface
    {
        return $this->vendor;
        dd($this);
    }

    public function setVendor(?VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getPrimaryOrder(): ?OrderInterface
    {
        return $this->primaryOrder;
    }

    public function setPrimaryOrder(?OrderInterface $primaryOrder): void
    {
        $this->primaryOrder = $primaryOrder;
    }

    public function addSubOrder(?OrderInterface $subOrder): void
    {
        $this->subOrders->add($subOrder);
    }

    public function getSubOrders(): ?Collection
    {

        return $this->subOrders;

    }

}
