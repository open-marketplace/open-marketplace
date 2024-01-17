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

final class SettlementPage extends SymfonyPage implements SettlementPageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_admin_settlement_index';
    }

    public function openSettlementsIndex(array $sorting = []): void
    {
        $this->open($sorting);
    }

    public function getSettlements(): array
    {
        return $this->getDocument()
            ->find('css', 'table.table')
            ->findAll('css', 'tr.item');
    }

    public function getSettlementsWithStatus(string $status = null): array
    {
        $locator = null !== $status
            ? sprintf('table.table > tbody > tr.item:contains("%s")', $status)
            : 'table.table > tbody > tr.item'
        ;

        return $this->getDocument()->findAll('css', $locator);
    }

    public function getSettlementsForVendor(string $vendorName): array
    {
        $locator = sprintf('table.table > tbody > tr.item:contains("%s")', $vendorName);

        return $this->getDocument()->findAll('css', $locator);
    }

    public function checkExistsSettlementForAmountAndChannel(string $amount, string $channelName): void
    {
        $locator = sprintf('table.table > tbody > tr.item:contains("%s") > td:contains("%s")', $amount, $channelName);

        $row = $this->getDocument()->find('css', $locator);
        Assert::notNull($row);
    }

    public function getSettlementsByPeriodEndsToday(bool $endsToday): array
    {
        $endsTodayString = sprintf(' - %s', date('d/m/Y'));

        $locator = $endsToday
            ? sprintf('table.table > tbody > tr.item:contains("%s")', $endsTodayString)
            : sprintf('table.table > tbody > tr.item:not(:contains("%s"))', $endsTodayString)
        ;

        return $this->getDocument()->findAll('css', $locator);
    }

    public function getSortedSettlements(array $sorting): array
    {
        $this->open($sorting);

        return $this->getSettlements();
    }

    public function filterByStatus(string $status): void
    {
        $form = $this->getForm();
        $statusDropdown = $form->find('css', 'select[id="criteria_status_status"]');
        $statusDropdown->selectOption($status);

        $form->submit();
    }

    public function filterByPeriod(string $period): void
    {
        $form = $this->getForm();
        $periodDropdown = $form->find('css', 'select[id="criteria_period_period"]');
        $periodDropdown->selectOption($period);

        $form->submit();
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
