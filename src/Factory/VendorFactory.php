<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class VendorFactory implements FactoryInterface
{
    private int $defaultCommission;

    private string $defaultCommissionType;

    public function __construct(
        string $defaultCommission,
        string $defaultCommissionType
    ) {
        $this->defaultCommission = (int) $defaultCommission;
        $this->defaultCommissionType = $defaultCommissionType;
    }

    /** @return VendorInterface */
    public function createNew()
    {
        $vendor = new Vendor();
        $vendor->setCommission($this->defaultCommission);
        $vendor->setCommissionType($this->defaultCommissionType);

        return $vendor;
    }
}
