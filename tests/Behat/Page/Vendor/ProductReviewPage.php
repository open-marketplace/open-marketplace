<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;

final class ProductReviewPage extends SymfonyPage implements ProductReviewPageInterface
{
    public function getRouteName(): string
    {
        return 'open_marketplace_vendor_product_review_index';
    }

    public function getReviews(): array
    {
        $page = $this->getDocument();
        $tableWrapper = $page->find('css', 'table.table');

        return $tableWrapper->findAll('css', 'tr.item');
    }

    public function clickButton(string $button): void
    {
        $this->getDocument()->pressButton($button);
    }

    public function clickButtonFirstReview(string $button): void
    {
        $page = $this->getDocument();
        $firstReview = $page->find('css', 'table.table tr.item:first-child');
        $firstReview->pressButton($button);
    }

    public function clickEditFirstReview(): void
    {
        $page = $this->getDocument();
        $editLint = $page->find('css', 'table.table tr.item:first-child a');
        $editLint->press();
    }
}
