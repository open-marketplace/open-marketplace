<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use Tests\BitBag\OpenMarketplace\Behat\Page\Vendor\ProductReviewPageInterface;
use Webmozart\Assert\Assert;

final class ProductReviewContext implements Context
{
    private ProductReviewPageInterface $productReviewPage;

    public function __construct(ProductReviewPageInterface $productReviewPage)
    {
        $this->productReviewPage = $productReviewPage;
    }

    /**
     * @Then I should see :count reviews
     */
    public function iShouldSeeReviews($count): void
    {
        $reviews = $this->productReviewPage->getReviews();
        Assert::eq(count($reviews), $count);
    }

    /**
     * @Given I click :button
     */
    public function iClick(string $button): void
    {
        $this->productReviewPage->clickButton($button);
    }

    /**
     * @When I click :button first review
     */
    public function iClickFirstReview(string $button): void
    {
        $this->productReviewPage->clickButtonFirstReview($button);
    }

    /**
     * @When I edit first review
     */
    public function iEditFirstReview(): void
    {
        $this->productReviewPage->clickEditFirstReview();
    }
}
