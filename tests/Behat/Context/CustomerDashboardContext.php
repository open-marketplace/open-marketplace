<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page\CustomerDashboardPage;
use function PHPUnit\Framework\assertTrue;

class CustomerDashboardContext extends MinkContext implements Context
{
    private CustomerDashboardPage $dashboardPage;

    public function __construct(CustomerDashboardPage $dashboardPage)
    {
        $this->dashboardPage = $dashboardPage;
    }
    
    /**
     * @Then I should see :arg1 inside sidebar
     */
    public function iShouldSeeInsideSidebar($arg1)
    {
        assertTrue($this->dashboardPage->itemWithValueExistsInsideSidebar($arg1), "Cannot find $arg1 inside sidebar");
    }
}
