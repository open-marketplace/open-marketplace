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
use Behat\Mink\Element\NodeElement;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;
use Webmozart\Assert\Assert;

final class VirtualWalletPage extends SymfonyPage implements VirtualWalletPageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_admin_virtual_wallet_index';
    }

    public function getVirtualWallets(): array
    {
        return $this->getDocument()
            ->find('css', 'table.table')
            ->findAll('css', 'tr.item');
    }

    public function getSortedVirtualWallets(array $sorting): array
    {
        $this->open($sorting);

        return $this->getVirtualWallets();
    }

    public function checkExistsVirtualWalletForAmountAndChannel(string $amount, string $channelName): void
    {
        $locator = sprintf('table.table > tbody > tr.item:contains("%s") > td:contains("%s")', $amount, $channelName);

        $row = $this->getDocument()->find('css', $locator);
        Assert::notNull($row);
    }

    public function filterByVendor(string $vendor): void
    {
        $form = $this->getForm();
        $vendorDropdown = $form->find('css', 'select[id="criteria_vendor"]');
        $vendorDropdown->selectOption($vendor);

        $form->submit();
    }

    public function filterByChannel(string $channelName): void
    {
        $form = $this->getForm();
        $vendorDropdown = $form->find('css', 'select[id="criteria_channel"]');
        $vendorDropdown->selectOption($channelName);

        $form->submit();
    }

    public function clearFilters(): void
    {
        $form = $this->getForm();
        $form->clickLink('Clear filters');
    }

    private function getPage(): DocumentElement
    {
        return $this->getSession()->getPage();
    }

    private function getForm(): NodeElement
    {
        $page = $this->getPage();
        $content = $page->find('css', 'div[class="ui styled fluid accordion"]');

        return $content->find('css', 'form');
    }
}
