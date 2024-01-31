<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor\ProductListing;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

final class EditPage extends SymfonyPage implements EditPageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_vendor_product_listings_edit';
    }

    public function fillTaxCategory(string $taxCategoryName): void
    {
        $this->getDocument()
            ->fillField(
                'sylius_product[taxCategory]',
                $taxCategoryName,
            );
    }

    public function fillFormWithDefaultData(): void
    {
        $this->getDocument()->fillField('Code', 'code');
        $this->getDocument()->fillField('Price', '10');
        $this->getDocument()->fillField('Original price', '20');
        $this->getDocument()->fillField('Minimum price', '30');
        $this->getDocument()->fillField('Name', 'test');
        $this->getDocument()->fillField('Slug', 'product');
        $this->getDocument()->fillField('Description', 'product description');
    }
}
