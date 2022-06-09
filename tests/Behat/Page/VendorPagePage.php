<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;
use Webmozart\Assert\Assert;

class VendorPagePage extends SymfonyPage implements VendorPagePageInterface
{
    public function getRouteName(): string
    {
        return 'bitbag_sylius_multi_vendor_marketplace_plugin_vendor_page_show';
    }

    public function getFirstProductNameFromList(): string
    {
        $page = $this->getDocument();
        $productsList = $page->findById('products');
        return $productsList->find('css', '[data-test-product]:first-child [data-test-product-content] [data-test-product-name]')->getText();
    }

    public function getLastProductNameFromList(): string
    {
        $page = $this->getDocument();
        $productsList = $page->findById('products');
        return $productsList->find('css', '[data-test-product]:last-child [data-test-product-content] [data-test-product-name]')->getText();
    }
}
