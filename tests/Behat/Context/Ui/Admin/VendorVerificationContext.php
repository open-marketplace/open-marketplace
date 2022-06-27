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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

final class VendorVerificationContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private ContainerInterface $container;

    public function __construct(
        EntityManagerInterface $entityManager,
        ContainerInterface $container
    ) {
        $this->entityManager = $entityManager;
        $this->container = $container;
    }

    /**
     * @Given There is an unverified Vendor
     */
    public function thereIsAnUnverifiedVendor()
    {
        $vendor = new Vendor();
        $vendorAddress = new VendorAddress();

        $vendorCountry = $this->container->get('sylius.factory.country')->createNew();
        $vendorCountry->setCode('US');
        $this->entityManager->persist($vendorCountry);
        $vendor->setCompanyName('vendor');
        $vendor->setTaxIdentifier('vendorTax');
        $vendor->setPhoneNumber('vendorPhone');

        $vendorAddress->setCountry($vendorCountry);
        $vendorAddress->setCity('vendorCity');
        $vendorAddress->setStreet('vendorStreet');
        $vendorAddress->setPostalCode('vendorCode');

        $vendor->setVendorAddress($vendorAddress);
        $vendor->setStatus('unverified');
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @When I click :buttonText
     */
    public function iClick($buttonText)
    {
        $this->getSession()->getPage()->pressButton($buttonText);
        sleep(1);
    }
}
