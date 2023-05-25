<?php

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Vendor;

use FriendsOfBehat\PageObjectExtension\Page\PageInterface;

interface ProductReviewPageInterface extends PageInterface
{
    public function getRouteName(): string;

    public function getReviews(): array;

    public function clickButton(string $button): void;

    public function clickButtonFirstReview(string $button): void;

    public function clickEditFirstReview(): void;
}
