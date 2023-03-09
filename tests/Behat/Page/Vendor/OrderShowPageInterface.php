<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

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
