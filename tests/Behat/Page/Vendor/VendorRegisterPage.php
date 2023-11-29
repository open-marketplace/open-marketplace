<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

final class VendorRegisterPage extends SymfonyPage
{
    public function getRouteName(): string
    {
        return 'open_marketplace_vendor_register_form';
    }

    public function getValidationMessageCount($messageClass): int
    {
        $page = $this->getDocument();
        $validationMessages = $page->findAll('css', ".$messageClass");

        return count($validationMessages);
    }
}
