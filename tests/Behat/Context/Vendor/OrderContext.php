<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use function PHPUnit\Framework\assertStringContainsString;
use Sylius\Behat\Service\SharedStorageInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\Vendor\OrderShowPageInterface;

final class OrderContext implements Context
{
    private OrderShowPageInterface $orderShowPage;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        OrderShowPageInterface $orderShowPage,
        SharedStorageInterface $sharedStorage,
    ) {
        $this->orderShowPage = $orderShowPage;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Then I should see order with number :number
     */
    public function iShouldSeeOrderWithNumber(string $number): void
    {
        $headerText = $this->orderShowPage->getHeaderText();
        assertStringContainsString($number, $headerText);
    }

    /**
     * @Given I am on order details page
     */
    public function iAmOnOrderDetailsPage(): void
    {
        $order = $this->sharedStorage->get('order');
        $this->orderShowPage->open(['id' => $order->getId()]);
    }

    /**
     * @Given I try to open order details page
     */
    public function iToTryOpenOrderDetailsPage(): void
    {
        $order = $this->sharedStorage->get('order');
        $this->orderShowPage->tryToOpen(['id' => $order->getId()]);
    }

    /**
     * @Given I resend the order confirmation email as vendor
     */
    public function iResendTheOrderConfirmationEmailAsVendor()
    {
        $this->orderShowPage->clickResendEmail();
    }

    /**
     * @Then I should see customer details with name :name
     */
    public function iShouldSeeCustomerDetailsWithName(string $name): void
    {
        $customerText = $this->orderShowPage->getCustomerText();
        assertStringContainsString($name, $customerText);
    }

    /**
     * @Then I should see customer billing address :address
     */
    public function iShouldSeeCustomerBillingAddress(string $address): void
    {
        $billingAddressText = $this->orderShowPage->getBillingAddressText();
        assertStringContainsString($address, $billingAddressText);
    }

    /**
     * @Then I should see customer shipping address :address
     */
    public function iShouldSeeCustomerShippingAddress(string $address): void
    {
        $shippingAddressText = $this->orderShowPage->getShippingAddressText();
        assertStringContainsString($address, $shippingAddressText);
    }

    /**
     * @Then I should see shipping state :state
     */
    public function iShouldSeeShippingState(string $state)
    {
        $shippingStateText = $this->orderShowPage->getShippingStateText();
        assertStringContainsString($state, $shippingStateText);
    }
}
