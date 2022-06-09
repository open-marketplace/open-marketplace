<?php

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use Doctrine\ORM\EntityManagerInterface;

final class VendorEditingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ){
        $this->entityManager = $entityManager;
    }

    /**
     * @Given There is a :ifVerified vendor which :ifRequested change
     */
    public function thereIsAVendorWhichChange($ifVerified, $ifRequested)
    {
        $vendor = new Vendor();
        $vendor->setCompanyName('vendor');
        $vendor->setTaxIdentifier('vendorTax');
        $vendor->setPhoneNumber('vendorPhone');
        $vendor->setStatus($ifVerified);
        $ifRequested == 'requested' ? $vendor->setEditDate('editDate') : $vendor->setEditDate(null);
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }
}
