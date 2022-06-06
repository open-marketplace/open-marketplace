<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page\vendor;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

class VendorRegisterPage extends SymfonyPage
{
    public function getRouteName(): string
    {
        return 'vendor_register_form';
    }
    
    public function getValidationMessageCount($messageClass): int
    {
        $page = $this->getDocument();
        $validationMessages = $page->findAll('css', ".$messageClass");
        return count($validationMessages);
    }
}
