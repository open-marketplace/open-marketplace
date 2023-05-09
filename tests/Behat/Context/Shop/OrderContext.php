<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Shop;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Entity\Order;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Repository\OrderRepository;
use function PHPUnit\Framework\assertStringContainsString;
use function PHPUnit\Framework\assertStringNotContainsString;
use Sylius\Behat\Service\SharedStorageInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\ShowProductPage;
use Webmozart\Assert\Assert;

class OrderContext extends RawMinkContext implements Context
{
    private ShowProductPage $productPage;

    private SharedStorageInterface $sharedStorage;

    private OrderRepository $orderRepository;

    public function __construct(
        ShowProductPage $productPage,
        SharedStorageInterface $sharedStorage,
        OrderRepository $orderRepository,
        ) {
        $this->productPage = $productPage;
        $this->sharedStorage = $sharedStorage;
        $this->orderRepository = $orderRepository;
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
     * @Then I should see :count :mode order(s)
     */
    public function iShouldSeeOrdersWithMode($count, $mode)
    {
        $page = $this->getSession()->getPage();
        $tableWrapper = $page->find('css', 'table');
        $orders = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($orders), $count);
        $htmlString = $page->getHtml();
        $pattern = "/\/admin\/orders\/(\d+)/";
        preg_match_all($pattern, $htmlString, $matches);
        $orders = $this->orderRepository->findBy(['id' => $matches[1]]);
        Assert::eq(count($orders), $count);
        foreach ($orders as $order) {
            Assert::eq($order->getMode(), $mode);
        }
    }

    /**
     * @Then I should see :count :mode order(s) in order history
     */
    public function iShouldSeeOrdersWithModeInHistory($count, $mode)
    {
        $page = $this->getSession()->getPage();
        $tableWrapper = $page->find('css', 'table');
        $orders = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($orders), $count);
        $htmlString = $page->getHtml();
        $pattern = "/\/.*\/account\/orders\/(\d+)/";
        preg_match_all($pattern, $htmlString, $matches);
        $orders = $this->orderRepository->findBy(['number' => $matches[1]]);
        Assert::eq(count($orders), $count);
        foreach ($orders as $order) {
            Assert::eq($order->getMode(), $mode);
        }
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
        $this->visitPath("/en_US/account/vendor/orders?limit=$paginationLimit&page=$pageNumber");
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
     * @Then I should see customer with name :name
     */
    public function iShouldSeeClientWithName($name)
    {
        $page = $this->getSession()->getPage();
        $table = $page->find('css', '.ui.sortable.stackable.very.basic.celled.table');
        assertStringContainsString($name, $table->getText());
    }

    /**
     * @Then I should not see customer with name :name
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
        $this->visitPath('en_US/account/vendor/customers');
    }

    /**
     * @Then I should see customer details with name :name
     */
    public function iShouldSeeCustomerDetailsWithName($name)
    {
        $page = $this->getSession()->getPage();
        $card = $page->find('css', '.ui.fluid.card');
        assertStringContainsString($name, $card->getText());
    }

    /**
     * @Given I finalize order
     */
    public function iFinalizeOrder()
    {
        $this->visitPath('/en_US/checkout/address');
        $this->fillField('sylius_checkout_address[billingAddress][firstName]', 'Test name');
        $this->fillField('sylius_checkout_address[billingAddress][lastName]', 'Test name');
        $this->fillField('sylius_checkout_address[billingAddress][company]', 'Test company');
        $this->fillField('sylius_checkout_address[billingAddress][street]', 'Test street');
        $this->selectOption('sylius_checkout_address[billingAddress][countryCode]', 'United States');
        $this->fillField('sylius_checkout_address[billingAddress][city]', 'Test city');
        $this->fillField('sylius_checkout_address[billingAddress][postcode]', 'Test code');
        $this->iSubmitForm();
        $this->iChooseShipment();
        $this->iChoosePayment();
        $this->iCompleteCheckout();
    }

    /**
     * @Then primary order should not have number
     */
    public function primaryOrderShouldNotHaveNumber()
    {
        /** @var Order|null $order */
        $order = $this->orderRepository->findOneBy(['mode' => OrderInterface::PRIMARY_ORDER_MODE]);

        if (null !== $order) {
            Assert::eq($order->getNumber(), null);
        }
    }

    private function fillField($field, $value)
    {
        $field = $this->fixStepArgument($field);
        $value = $this->fixStepArgument($value);
        $this->getSession()->getPage()->fillField($field, $value);
    }

    private function fixStepArgument($argument): array|string
    {
        return str_replace('\\"', '"', $argument);
    }

    private function selectOption($select, $option)
    {
        $select = $this->fixStepArgument($select);
        $option = $this->fixStepArgument($option);
        $this->getSession()->getPage()->selectFieldOption($select, $option);
    }
}
