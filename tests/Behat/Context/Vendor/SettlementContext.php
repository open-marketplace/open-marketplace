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
     * @Then I should see :count settlements
     */
    public function iShouldSeeSettlements($count): void
    {
        $settlements = $this->vendorSettlementPage->getSettlements();
        Assert::eq(count($settlements), $count);
    }
}
