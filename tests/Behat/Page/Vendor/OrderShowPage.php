<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

final class OrderShowPage extends SymfonyPage implements OrderShowPageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_vendor_order_show';
    }

    public function clickResendEmail(): void
    {
        $this->getDocument()->clickLink('Resend the order confirmation email');
    }

    public function getHeaderText(): string
    {
        $page = $this->getDocument();

        return $page->find('css', '.ui.header')->getText();
    }

    public function getCustomerText(): string
    {
        $page = $this->getDocument();

        return $page->find('css', '#customer')->getText();
    }

    public function getBillingAddressText(): string
    {
        $page = $this->getDocument();

        return $page->find('css', '#billing-address')->getText();
    }

    public function getShippingAddressText(): string
    {
        $page = $this->getDocument();

        return $page->find('css', '#shipping-address')->getText();
    }

    public function getShippingStateText(): string
    {
        $page = $this->getDocument();

        return $page->find('css', '#shipping-state')->getText();
    }
}
