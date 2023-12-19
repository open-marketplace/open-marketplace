<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\MinkExtension\Context\MinkContext;
use Tests\BitBag\OpenMarketplace\Behat\Page\Vendor\VendorSettlementPageInterface;
use Webmozart\Assert\Assert;

final class SettlementContext extends MinkContext
{
    public function __construct(
        private VendorSettlementPageInterface $vendorSettlementPage,
    ) {
    }

    /**
     * @When I visit the vendor settlements page
     */
    public function iVisitTheVendorSettlementsPage(): void
    {
        $this->vendorSettlementPage->openSettlementsIndex();
    }

    /**
     * @When I accept first possible settlement
     */
    public function iAcceptFirstPossibleSettlement(): void
    {
        $button = $this->vendorSettlementPage->findFirstAcceptButton();
        Assert::notNull($button);

        $button->click();
    }

    /**
     * @When I should see :count settlements with status :status
     * @When I should see :count settlements
     */
    public function iSeeSettlementsWithStatus(string $count, string $status = null): void
    {
        $settlements = $this->vendorSettlementPage->getSettlementsWithStatus($status);

        Assert::eq(count($settlements), $count);
    }

    /**
     * @Then I should not see any accept button
     */
    public function iShouldNotSeeAnyAcceptButton(): void
    {
        $button = $this->vendorSettlementPage->findFirstAcceptButton();
        Assert::null($button);
    }

    /**
     * @When I filter settlements by status :status
     */
    public function iFilterSettlementsByStatus(string $status): void
    {
        $this->vendorSettlementPage->filterByStatus($status);
    }

    /**
     * @When I filter settlements by period :period
     */
    public function iFilterSettlementsByPeriod(string $period): void
    {
        $this->vendorSettlementPage->filterByPeriod($period);
    }
}
