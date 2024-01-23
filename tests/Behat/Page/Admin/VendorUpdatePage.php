<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Admin;

use Behat\Mink\Element\DocumentElement;
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
        $content = $this->getPage()->getText();
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

    private function getPage(): DocumentElement
    {
        return $this->getSession()->getPage();
    }
}
