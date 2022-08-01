<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Shop;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use function PHPUnit\Framework\assertStringContainsString;
use function PHPUnit\Framework\assertStringNotContainsString;
use Sylius\Behat\Service\SharedStorageInterface;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page\ShowProductPage;
use Webmozart\Assert\Assert;

class OrderContext extends RawMinkContext implements Context
{
    private ShowProductPage $productPage;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        ShowProductPage $productPage,
        SharedStorageInterface $sharedStorage,
    ) {
        $this->productPage = $productPage;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Then I should see :count orders
     */
    public function iShouldSeeOrders($count)
    {
        $page = $this->getSession()->getPage();
        $tableWrapper = $page->find('css', 'table');
        $orders = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($orders), $count);
    }

    /**
     * @Given I complete checkout
     */
    public function iCompleteCheckout()
    {
        $page = $this->getSession()->getPage();
        $page->find('css', 'button')->press();
    }

    /**
     * @Given I submit form
     */
    public function iSubmitForm()
    {
        $page = $this->getSession()->getPage();
        $page->find('css', '.ui.large.primary.icon.labeled.button')->press();
    }

    /**
     * @Given I choose shipment
     */
    public function iChooseShipment()
    {
        $page = $this->getSession()->getPage();
        $page->find('css', '.ui.large.primary.icon.labeled.button')->press();
    }

    /**
     * @Given I choose payment
     */
    public function iChoosePayment()
    {
        $page = $this->getSession()->getPage();
        $page->find('css', '.ui.large.primary.icon.labeled.button')->press();
    }

    /**
     * @Given I have :count products in cart
     */
    public function iHaveProductsInCart($count)
    {
        $products = $this->sharedStorage->get('products');
        for ($i = 1; $i <= $count; ++$i) {
            $slug = $products[$i]->getSlug();
            $this->productPage->open(['slug' => $slug]);
            $this->productPage->addToCart();
        }
        $this->sharedStorage->set('products', $products);
    }

    /**
     * @Given I click :button
     */
    public function iClickButton($button)
    {
        $this->getSession()->getPage()->pressButton($button);
    }

    /**
     * @Then I should see :ordersCount orders on page :pageNumber
     */
    public function iShouldSeeOrdersOnPage($ordersCount, $pageNumber)
    {
        $paginationLimit = $this->sharedStorage->get('pagination_limit');
        $this->visitPath("/en_US/orders?limit=$paginationLimit&page=$pageNumber");
        $page = $this->getSession()->getPage();
        $table = $page->find('css', '.ui.sortable.stackable.very.basic.celled.table');
        $orderRows = $table->findAll('css', '.item');

        Assert::count($orderRows, $ordersCount);
    }

    /**
     * @Given Pagination is set to display :paginationLimit orders per page
     */
    public function paginationIsSetToDisplayOrderPerPage($paginationLimit)
    {
        $this->sharedStorage->set('pagination_limit', $paginationLimit);
    }

    /**
     * @Then I should see order with number :number
     */
    public function iShouldSeeOrderWithNumber($number)
    {
        $page = $this->getSession()->getPage();
        $header = $page->find('css', '.ui.header');
        assertStringContainsString($number, $header->getText());
    }

    /**
     * @Then I should see client with name :name
     */
    public function iShouldSeeClientWithName($name)
    {
        $page = $this->getSession()->getPage();
        $table = $page->find('css', '.ui.sortable.stackable.very.basic.celled.table');
        assertStringContainsString($name, $table->getText());
    }

    /**
     * @Then I should not see client with name :name
     */
    public function iShouldNotSeeClientWithName($name)
    {
        $page = $this->getSession()->getPage();
        assertStringNotContainsString($name, $page->getText());
    }

    /**
     * @Given I am on customers page
     */
    public function iAmOnCustomersPage()
    {
        $this->visitPath('en_US/customers');
    }
}
