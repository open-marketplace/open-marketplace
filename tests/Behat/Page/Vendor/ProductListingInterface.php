<?php

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor;

use FriendsOfBehat\PageObjectExtension\Page\PageInterface;

interface ProductListingInterface extends PageInterface
{
    public function getRouteName(): string;
}
