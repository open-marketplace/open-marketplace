<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Shop\Account;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Sylius\Behat\Service\SharedStorageInterface;

final class OrderContext extends RawMinkContext implements Context
{
    public function __construct(
        private SharedStorageInterface $sharedStorage
    ) {
    }

    /**
     * @Then I should be on primary order payment page
     */
    public function iShouldBeOnPrimaryOrderPaymentPage(): void
    {
        $order = $this->sharedStorage->get('primary_order');

        $this->assertSession()->addressEquals(sprintf('/en_US/order/%s', $order->getTokenValue()));
    }
}
