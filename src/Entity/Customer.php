<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Core\Model\Customer as BaseCustomer;

class Customer extends BaseCustomer implements CustomerInterface
{
    private ?Vendor $vendor;

    public function setVendor(Vendor $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getVendor(): ?Vendor
    {
        return $this->vendor;
    }
}
