<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertStringContainsString;
use Sylius\Component\Core\Model\ChannelInterface;

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
     * @Then I should see :name shipping method in :channel channel
     */
    public function iShouldSeeShippingMethod(string $name, ChannelInterface $channel): void
    {
        $page = $this->getSession()->getPage();
        $channelTag = sprintf('#vendor_shipping_methods_channels_%s', $channel->getCode());
        $channelSection = $page->find('css', $channelTag);
        $input = $channelSection->find('css', sprintf('input[value=%s]', $name));

        assertNotNull($input);
        assertStringContainsString($name, $input->getAttribute('value'));
    }

    /**
     * @Then I enable :name shipping method in :channel channel
     */
    public function iEnableShippingMethod(string $name, ChannelInterface $channel): void
    {
        $page = $this->getSession()->getPage();
        $channelTag = sprintf('#vendor_shipping_methods_channels_%s', $channel->getCode());
        $channelSection = $page->find('css', $channelTag);
        $input = $channelSection->find('css', sprintf('input[value=%s]', $name));
        $input->check();
    }

    /**
     * @Then I should see :name enabled shipping method in :channel channel
     */
    public function iShouldSeeEnabledShippingMethod(string $name, ChannelInterface $channel): void
    {
        $page = $this->getSession()->getPage();
        $channelTag = sprintf('#vendor_shipping_methods_channels_%s', $channel->getCode());
        $channelSection = $page->find('css', $channelTag);
        $input = $channelSection->find('css', sprintf('input[value=%s][checked=checked]', $name));

        assertStringContainsString($name, $input->getAttribute('value'));
    }

    /**
     * @Then I should see :name disabled shipping method in :channel channel
     */
    public function iShouldSeeDisabledShippingMethod(string $name, ChannelInterface $channel): void
    {
        $page = $this->getSession()->getPage();
        $channelTag = sprintf('#vendor_shipping_methods_channels_%s', $channel->getCode());
        $channelSection = $page->find('css', $channelTag);
        $input = $channelSection->find('css', sprintf('input[value=%s]:not([checked=checked])', $name));

        assertStringContainsString($name, $input->getAttribute('value'));
    }
}
