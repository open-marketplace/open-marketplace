<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\VendorAddressUpdate;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdate;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdateInterface;
use BitBag\OpenMarketplace\Generator\TokenGeneratorInterface;

final class VendorProfileUpdateFactory implements VendorProfileUpdateFactoryInterface
{
    private TokenGeneratorInterface $tokenGenerator;

    public function __construct(TokenGeneratorInterface $tokenGenerator)
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
