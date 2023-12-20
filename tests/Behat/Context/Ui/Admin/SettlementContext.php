<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\MinkExtension\Context\MinkContext;
use Tests\BitBag\OpenMarketplace\Behat\Page\Admin\SettlementPageInterface;
use Webmozart\Assert\Assert;

final class SettlementContext extends MinkContext
{
    public function __construct(
        private SettlementPageInterface $adminSettlementPage,
    ) {
    }

    /**
     * @When I visit the admin settlements page
     */
    public function iVisitTheVendorSettlementsPage(): void
    {
        $this->adminSettlementPage->openSettlementsIndex();
    }

    /**
     * @When I should see :count settlements with status :status
     * @When I should see :count settlements
     */
    public function iSeeSettlementsWithStatus(string $count, string $status = null): void
    {
        $settlements = $this->adminSettlementPage->getSettlementsWithStatus($status);

        Assert::eq(count($settlements), $count);
    }

    /**
     * @When I filter settlements by status :status
     */
    public function iFilterSettlementsByStatus(string $status): void
    {
        $this->adminSettlementPage->filterByStatus($status);
    }

    /**
     * @When I filter settlements by period :period
     */
    public function iFilterSettlementsByPeriod(string $period): void
    {
        $this->adminSettlementPage->filterByPeriod($period);
    }

    /**
     * @When I filter settlements by vendor :vendor
     */
    public function iFilterSettlementsByVendor(string $vendor): void
    {
        $this->adminSettlementPage->filterByVendor($vendor);
    }

    /**
     * @Then I filter settlements by channel :channelName
     */
    public function iFilterSettlementsByChannel(string $channelName): void
    {
        $this->adminSettlementPage->filterByChannel($channelName);
    }


    /**
     * @Then I clear filters
     */
    public function iClearFilters(): void
    {
        $this->adminSettlementPage->clearFilters();
    }
}
