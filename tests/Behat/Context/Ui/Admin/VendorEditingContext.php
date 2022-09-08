<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Setup\Factory\VendorFactoryInterface;

final class VendorEditingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private VendorFactoryInterface $vendorFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        VendorFactoryInterface $vendorFactory
    ) {
        $this->entityManager = $entityManager;
        $this->vendorFactory = $vendorFactory;
    }

    /**
     * @Given There is a :ifVerified Vendor who :ifRequested change
     */
    public function thereIsAVendorWhoChange($ifVerified, $ifRequested): void
    {
        $vendor = $this->vendorFactory->createVendor(
            'vendor',
            'vendorTax',
            'vendorPhone',
            'slug',
            'description',
            $ifVerified
        );

        if ('requested' === $ifRequested) {
            $vendor->setEditedAt(new DateTime());
        }

        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }
}
