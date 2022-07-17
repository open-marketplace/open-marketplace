<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page\Vendor\VendorRegisterPage;
use Webmozart\Assert\Assert;

class VendorRegisterContext extends MinkContext implements Context
{
    private VendorRegisterPage $vendorRegisterPage;

    public function __construct(VendorRegisterPage $vendorRegisterPage)
    {
        $this->vendorRegisterPage = $vendorRegisterPage;
    }

    /**
     * @Then I should see :itemCLass :times times
     */
    public function iShouldSeeTimes($itemCLass, $times): void
    {
        $validationMessageCount = $this->vendorRegisterPage->getValidationMessageCount($itemCLass);
        Assert::eq($times, $validationMessageCount);
    }
}
