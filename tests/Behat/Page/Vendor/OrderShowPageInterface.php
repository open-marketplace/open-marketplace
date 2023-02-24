<?php

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPageInterface;

interface OrderShowPageInterface extends SymfonyPageInterface
{
    public function clickResendEmail(): void;

    public function getHeaderText(): string;

    public function getCustomerText(): string;

    public function getBillingAddressText(): string;

    public function getShippingAddressText(): string;

    public function getShippingStateText(): string;
}
