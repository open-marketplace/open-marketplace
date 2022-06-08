<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Addressing\Model\Country;

final class VendorFactory 
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createVendor(
        string $compoanyName,
        string $taxIdentifier,
        string $phoneNumber,
        VendorAddressInterface $address
    )
    {
        $vendor = $this->createNew();
        $vendor->setPhoneNumber($phoneNumber);
        $vendor->setCompanyName($compoanyName);
        $vendor->setTaxIdentifier($taxIdentifier);
        $vendor->setVendorAddress($address);
        return $vendor;
    }
    
    public function createNew():VendorProfileInterface
    {
        return new Vendor();
    }
}
