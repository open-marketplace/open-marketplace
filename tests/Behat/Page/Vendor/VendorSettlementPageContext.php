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

    public function findFirstAcceptButton(): ?NodeElement
    {
        return $this->getDocument()->findButton('Accept');
    }

    public function getSettlementsWithStatus(string $status = null): array
    {
        $locator = null !== $status
            ? sprintf('table.table > tbody > tr.item:contains("%s")', $status)
            : 'table.table > tbody > tr.item'
        ;

        return $this->getDocument()->findAll('css', $locator);
    }

    public function filterByStatus(string $status): void
    {
        $form = $this->getSession()->getPage()->find('css', 'form');
        $statusDropdown = $form->find('css', 'select[id="criteria_status_status"]');
        $statusDropdown->selectOption($status);

        $form->submit();
    }
}
