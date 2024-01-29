<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

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

    public function fillReviewSubject(string $subject): void;

    public function fillAuthor(string $name): void;
}
