<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor\ProductListing;

use Behat\Mink\Element\NodeElement;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

final class IndexPage extends SymfonyPage implements IndexPageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_vendor_product_listings_index';
    }

    public function getTableRows(): array
    {
        return $this->getDocument()
            ->findAll(
                'css',
                'table > tbody > tr',
            );
    }

    public function findStatus(string $status): ?NodeElement
    {
        return $this->getDocument()
            ->find(
                'css',
                sprintf('table > tbody > tr > td:contains("%s")', $status),
            );
    }

    public function findDropdownLink(): ?NodeElement
    {
        return $this->getDocument()
            ->find(
                'css',
                '.ui.labeled.icon.floating.dropdown.link.button',
            );
    }
}
