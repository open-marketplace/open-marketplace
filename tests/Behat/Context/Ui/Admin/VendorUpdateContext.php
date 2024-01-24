<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\MinkExtension\Context\RawMinkContext;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\Admin\VendorUpdatePageInterface;

final class VendorUpdateContext extends RawMinkContext
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ExampleFactoryInterface $vendorExampleFactory,
        private VendorUpdatePageInterface $vendorUpdatePage,
        ) {
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
     * @Given /^I should see settlement frequency "([^"]*)"$/
     */
    public function iShouldSeeSettlementFrequency(string $frequency): void
    {
        $this->vendorUpdatePage->checkSettlementFrequency($frequency);
    }

    /**
     * @When I set settlement frequency to :frequency
     */
    public function iSetSettlementFrequencyTo(string $frequency): void
    {
        $this->vendorUpdatePage->setSettlementFrequency($frequency);
    }

    /**
     * @When I submit vendor update form
     */
    public function iSubmitVendorUpdateForm(): void
    {
        $this->vendorUpdatePage->submitVendorForm();
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
