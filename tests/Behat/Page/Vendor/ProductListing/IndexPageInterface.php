<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor\ProductListing;

use Behat\Mink\Element\NodeElement;
use FriendsOfBehat\PageObjectExtension\Page\PageInterface;

interface IndexPageInterface extends PageInterface
{
    public function getTableRows(): array;

    public function findStatus(string $status): ?NodeElement;

    public function findDropdownLink(): ?NodeElement;
}
