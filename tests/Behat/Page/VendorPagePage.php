<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

final class VendorPagePage extends SymfonyPage implements VendorPagePageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_shop_vendor_page_index';
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

    public function countProduct(): int
    {
        $page = $this->getDocument();
        $productCards = $page->findAll('css', '.ui.fluid.card');

        return count($productCards);
    }

    public function productsSorted(array $sorting): bool
    {
        $page = $this->getDocument();

        $productCards = $page->findAll('css', '.ui.fluid.card');

        foreach ($productCards as $i => $productCard) {
            $productField[$i] = $productCard->find('css', '.sylius-product-' . $sorting['field'])->getText();

            if (0 === $i) {
                continue;
            }

            $comparatorValue = $productField[$i - 1] <= $productField[$i];

            if (
                ('asc' === $sorting['value'] && !$comparatorValue) ||
                ('desc' === $sorting['value'] && $comparatorValue)
            ) {
                return false;
            }
        }

        return true;
    }
}
