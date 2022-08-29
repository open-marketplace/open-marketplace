<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor as BaseVendor;

class Vendor extends BaseVendor
{
    protected ?string $type = null;

    protected ?float $commission = null;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getCommission(): ?float
    {
        return $this->commission;
    }

    public function setCommission(?float $commission): void
    {
        $this->commission = $commission;
    }
}
