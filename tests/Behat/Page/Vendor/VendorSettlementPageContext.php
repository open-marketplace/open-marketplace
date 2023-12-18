<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor;

use Behat\Mink\Element\NodeElement;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;
use Webmozart\Assert\Assert;

final class VendorSettlementPageContext extends SymfonyPage implements VendorSettlementPageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_vendor_settlements_index';
    }

    public function openSettlementsIndex(): void
    {
        $this->open();
    }

    public function getSettlements(): array
    {
        return $this->getDocument()
            ->find('css', 'table.table')
            ->findAll('css', 'tr.item')
        ;
    }

    public function findAcceptButton(): ?NodeElement
    {
        return $this->getDocument()->findButton('Accept');
    }

    public function getSettlementsWithStatus(string $status): array
    {
        $locator = sprintf('table.table > tbody > tr.item:contains("%s")', $status);

        return $this->getDocument()->findAll('css', $locator);
    }
}
