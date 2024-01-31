<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Admin;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;
use Webmozart\Assert\Assert;

final class VendorUpdatePage extends SymfonyPage implements VendorUpdatePageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_admin_vendor_update';
    }

    public function checkSettlementFrequency(string $frequency): void
    {
        $content = $this->getDocument()->getText();
        Assert::contains($content, $frequency);
    }

    public function setSettlementFrequency(string $frequency): void
    {
        $settlementFrequencyField = $this->getDocument()->find('css', 'select[name="vendor[settlementFrequency]"]');
        $settlementFrequencyField->selectOption($frequency);
    }

    public function submitVendorForm(): void
    {
        $this->getDocument()->pressButton('Save changes');
    }

    public function leaveTheStreetFieldEmpty(): void
    {
        $this->getDocument()->fillField('vendor_vendorAddress_street', '');
    }

    public function leaveThePostalCodeFieldEmpty(): void
    {
        $this->getDocument()->fillField('vendor_vendorAddress_postalCode', '');
    }

    public function leaveTheCityFieldEmpty(): void
    {
        $this->getDocument()->fillField('vendor_vendorAddress_street', '');
    }

    public function fillAddressFormWithDefaultData(): void
    {
        $this->getDocument()->fillField('vendor_vendorAddress_city', 'Warsaw');
        $this->getDocument()->fillField('vendor_vendorAddress_postalCode', '87-100');
        $this->getDocument()->fillField('vendor_vendorAddress_street', 'Groove Street');
    }
}
