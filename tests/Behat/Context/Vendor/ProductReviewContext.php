<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Component\Product\Repository\ProductReviewRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\CustomerRepositoryInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Review\Model\ReviewInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\Vendor\ProductReviewPageInterface;
use Webmozart\Assert\Assert;

final class ProductReviewContext extends RawMinkContext implements Context
{
    private ProductReviewPageInterface $productReviewPage;

    private SharedStorageInterface $sharedStorage;

    private ObjectManager $manager;

    private ProductReviewRepositoryInterface $productReviewRepository;

    private CustomerRepositoryInterface $customerRepository;

    public function __construct(
        ProductReviewPageInterface $productReviewPage,
        SharedStorageInterface $sharedStorage,
        ObjectManager $manager,
        ProductReviewRepositoryInterface $productReviewRepository,
        CustomerRepositoryInterface $customerRepository,
    ) {
        $this->productReviewPage = $productReviewPage;
        $this->sharedStorage = $sharedStorage;
        $this->manager = $manager;
        $this->productReviewRepository = $productReviewRepository;
        $this->customerRepository = $customerRepository;
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

    /**
     * @Then /^(this product) has (\d+) "([^"]+)" reviews$/
     */
    public function thisProductHasReview(
        ProductInterface $product,
        int $count,
        string $status,
    ): void {
        $productReviews = $this->productReviewRepository->findBy(['reviewSubject' => $product, 'status' => $status]);
        Assert::count($productReviews, $count);
    }

    /**
     * @Given /^I am on edit page of review added by "([^"]+)" to (this product)$/
     */
    public function iAmOnEditPageOfReviewAddedByToProduct(string $customer, ProductInterface $product)
    {
        $customer = $this->customerRepository->findOneBy(['email' => $customer]);
        $productReview = $this->productReviewRepository->findOneBy(['reviewSubject' => $product, 'author' => $customer]
        );
        $this->sharedStorage->set('review', $productReview);

        $this->productReviewPage->open(['id' => $productReview->getId()]);
    }

    /**
     * @Then /^(this review) should have name "([^"]+)"$/
     */
    public function thisReviewShouldHaveName(ReviewInterface $review, string $name): void
    {
        $this->manager->refresh($review);
        Assert::same($review->getTitle(), $name);
    }

    /**
     * @Then /^(this review) should have comment "([^"]+)"$/
     */
    public function thisReviewShouldHaveComment(ReviewInterface $review, string $comment): void
    {
        $this->manager->refresh($review);
        Assert::same($review->getComment(), $comment);
    }

    /**
     * @Given I am on vendor product reviews listing page
     */
    public function iAmOnVendorProductReviewsListingPage(): void
    {
        $this->visitPath('/en_US/account/vendor/product-reviews');
    }

    /**
     * @When I fill in the author field with :name value
     */
    public function iFillInTheAuthorFieldWithName(string $name): void
    {
        $this->getPage()->fillField('criteria[author][value]', $name);
    }

    /**
     * @When I fill in the review subject field with :subject value
     */
    public function iFillInTheReviewSubjectWithName(string $subject): void
    {
        $this->getPage()->fillField('criteria[reviewSubject][value]', $subject);
    }

    private function getPage(): DocumentElement
    {
        return $this->getSession()->getPage();
    }
}
