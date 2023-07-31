<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\AddressInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class VendorProfileFactory implements VendorProfileFactoryInterface
{
    private FactoryInterface $vendorFactory;

    public function __construct(FactoryInterface $vendorFactory)
    {
        $this->vendorFactory = $vendorFactory;
    }

    public function createVendor(
        string $companyName,
        string $taxIdentifier,
        string $phoneNumber,
        string $description,
        AddressInterface $address
    ): ProfileInterface {
        $vendor = $this->createNew();
        $vendor->setPhoneNumber($phoneNumber);
        $vendor->setCompanyName($companyName);
        $vendor->setTaxIdentifier($taxIdentifier);
        $vendor->setDescription($description);
        $vendor->setVendorAddress($address);

        return $vendor;
    }

    public function createNew(): ProfileInterface
    {
        /** @var ProfileInterface $vendor */
        $vendor = $this->vendorFactory->createNew();

        return $vendor;
    }
}
