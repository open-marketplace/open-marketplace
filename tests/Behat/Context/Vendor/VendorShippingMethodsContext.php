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
use Behat\MinkExtension\Context\RawMinkContext;
use function PHPUnit\Framework\assertStringContainsString;

class VendorShippingMethodsContext extends RawMinkContext implements Context
{
    /**
     * @Given I click :button button
     */
    public function iClickButton(string $button)
    {
        $this->getSession()->getPage()->pressButton($button);
    }

    /**
     * @Then I should see :name shipping method
     */
    public function iShouldSeeShippingMethod(string $name): void
    {
        $page = $this->getSession()->getPage();
        $select = $page->find('css', sprintf('input[value=%s]', $name));

        assertStringContainsString($name, $select->getAttribute('value'));
    }

    /**
     * @Then I enable :name shipping method
     */
    public function iEnableShippingMethod(string $name): void
    {
        $page = $this->getSession()->getPage();
        $select = $page->find('css', sprintf('input[value=%s]', $name));
        $select->check();
    }

    /**
     * @Then I should see :name enabled shipping method
     */
    public function iShouldSeeEnabledShippingMethod(string $name): void
    {
        $page = $this->getSession()->getPage();
        $select = $page->find('css', sprintf('input[value=%s][checked=checked]', $name));

        assertStringContainsString($name, $select->getAttribute('value'));
    }

    /**
     * @Then I should see :name disabled shipping method
     */
    public function iShouldSeeDisabledShippingMethod(string $name): void
    {
        $page = $this->getSession()->getPage();
        $select = $page->find('css', sprintf('input[value=%s]:not([checked=checked])', $name));

        assertStringContainsString($name, $select->getAttribute('value'));
    }
}
