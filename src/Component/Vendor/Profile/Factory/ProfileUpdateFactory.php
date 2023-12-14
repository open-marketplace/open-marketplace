<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Profile\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\Address;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdate;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\TokenGeneratorInterface;

final class ProfileUpdateFactory implements ProfileUpdateFactoryInterface
{
    private TokenGeneratorInterface $tokenGenerator;

    public function __construct(TokenGeneratorInterface $tokenGenerator)
    {
        $this->tokenGenerator = $tokenGenerator;
    }

    public function createWithGeneratedTokenAndVendor(
        VendorInterface $vendor
    ): ProfileUpdateInterface {
        $vendorUpdate = new ProfileUpdate();
        $vendorUpdate->setVendorAddress(new Address());
        $vendorUpdate->setToken($this->tokenGenerator->generate());
        $vendorUpdate->setVendor($vendor);

        return $vendorUpdate;
    }
}
