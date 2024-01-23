<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Admin;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

final class VendorPage extends SymfonyPage implements VendorPageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_admin_vendor_index';
    }

    public function clickEditButton(string $vendorName): void
    {
        $row = $this->getDocument()->findAll('css', 'table.table > tbody > tr.item:contains("' . $vendorName . '")');
        $link = $row[0]->find('css', 'a:contains("Edit")');
        $link->click();
    }
}
