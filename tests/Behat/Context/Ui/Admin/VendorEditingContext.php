<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;

final class VendorEditingContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private ExampleFactoryInterface $vendorExampleFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        ExampleFactoryInterface $vendorExampleFactory
    ) {
        $this->entityManager = $entityManager;
        $this->vendorExampleFactory = $vendorExampleFactory;
    }

    /**
     * @Given There is a :ifVerified Vendor who :ifRequested a profile change
     */
    public function thereIsAVendorWhoChange($ifVerified, $ifRequested): void
    {
        $options = [
            'company_name' => 'vendor',
            'phone_number' => 'vendorPhone',
            'tax_identifier' => 'vendorTax',
            'slug' => 'slug',
            'description' => 'description',
            'status' => $ifVerified,
        ];

        $vendor = $this->vendorExampleFactory->create($options);

        if ('requested' === $ifRequested) {
            $vendor->setEditedAt(new DateTime());
        }

        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    /**
     * @When there is an address form filled with default values
     */
    public function thereIsAnAddressFormFilledWithDefaultValues(): void
    {
        $this->getPage()->fillField('vendor_vendorAddress_city', 'Warsaw');
        $this->getPage()->fillField('vendor_vendorAddress_postalCode', '87-100');
        $this->getPage()->fillField('vendor_vendorAddress_street', 'Groove Street');
    }

    /**
     * @When I leave the city field empty
     */
    public function iLeaveTheCityFieldEmpty(): void
    {
        $this->getPage()->fillField('vendor_vendorAddress_street', '');
    }

    /**
     * @When I leave the postal code field empty
     */
    public function iLeaveThePostalCodeFieldEmpty(): void
    {
        $this->getPage()->fillField('vendor_vendorAddress_postalCode', '');
    }

    /**
     * @When I leave the street field empty
     */
    public function iLeaveTheStreetFieldEmpty(): void
    {
        $this->getPage()->fillField('vendor_vendorAddress_street', '');
    }

    private function getPage(): DocumentElement
    {
        return $this->getSession()->getPage();
    }
}
