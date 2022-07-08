<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder implements OrderInterface
{
    private ?VendorInterface $vendor;

    private ?OrderInterface $primaryOrder;

    public function getVendor(): ?VendorInterface
    {
        return $this->vendor;
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
}
