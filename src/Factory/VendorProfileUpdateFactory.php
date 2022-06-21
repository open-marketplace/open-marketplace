<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Generator\TokenGenerator;

final class VendorProfileUpdateFactory implements VendorProfileUpdateFactoryInterface
{
    private TokenGenerator $tokenGenerator;

    public function __construct(TokenGenerator $tokenGenerator)
    {
        $this->tokenGenerator = $tokenGenerator;
    }

    public function createWithGeneratedTokenAndVendor(
        VendorInterface $vendor
    ): VendorProfileUpdateInterface {
        $vendorUpdate = new VendorProfileUpdate();
        $vendorUpdate->setVendorAddress(new VendorAddressUpdate());
        $vendorUpdate->setToken($this->tokenGenerator->generate());
        $vendorUpdate->setVendor($vendor);

        return $vendorUpdate;
    }
}
