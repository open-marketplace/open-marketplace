<?php

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
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
     * @Given There is a :ifVerified vendor
     */
    public function thereIsAVendor($ifVerified)
    {
        $vendor = new Vendor();
        $vendor->setCompanyName('vendor');
        $vendor->setTaxIdentifier('vendorTax');
        $vendor->setPhoneNumber('vendorPhone');
        $vendor->setStatus($ifVerified);
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @Given There is a :ifVerified vendor which requested change
     */
    public function thereIsAVendorWhichRequestedChange($ifVerified)
    {
        $vendor = new Vendor();
        $vendor->setCompanyName('vendor');
        $vendor->setTaxIdentifier('vendorTax');
        $vendor->setPhoneNumber('vendorPhone');
        $vendor->setStatus($ifVerified);
        $vendor->setEditDate('editDate');
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @When I click :buttonText
     */
    public function iClick($buttonText)
    {
        $this->getPage()->pressButton($buttonText);
    }

    /**
     * @return DocumentElement
     */
    private function getPage()
    {
        return $this->getSession()->getPage();
    }
}
