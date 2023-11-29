<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Shop;

use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Component\Order\Entity\Order;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepository;
use function PHPUnit\Framework\assertStringContainsString;
use function PHPUnit\Framework\assertStringNotContainsString;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\PaymentMethodRepository;
use Sylius\Component\Core\Factory\PaymentMethodFactoryInterface;
use Tests\BitBag\OpenMarketplace\Behat\Page\ShowProductPage;
use Webmozart\Assert\Assert;

final class OrderContext extends RawMinkContext
{
    public function __construct(
        private ShowProductPage $productPage,
        private SharedStorageInterface $sharedStorage,
        private OrderRepository $orderRepository,
        private PaymentMethodFactoryInterface $paymentMethodFactory,
        private PaymentMethodRepository $methodRepository
    ) {
    }

    /**
     * @Then I should see :count orders
     */
    public function iShouldSeeOrders(int $count): void
    {
        $page = $this->getPage();
        $tableWrapper = $page->find('css', 'table');
        $orders = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($orders), $count);
    }

    /**
     * @Then I should see :count :mode order(s)
     */
    public function iShouldSeeOrdersWithMode(int $count, string $mode): void
    {
        $page = $this->getPage();
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
    public function iShouldSeeOrdersWithModeInHistory(int $count, string $mode): void
    {
        $page = $this->getPage();
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
     * @Then I should see :count orders with :status status label :color
     */
    public function iShouldSeeOrdersWithStatus(
        int $count,
        string $status,
        string $color
    ): void {
        $page = $this->getPage();
        $tableWrapper = $page->find('css', 'table');
        $orders = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($orders), $count);
        $labels = $page->findAll('css', '.ui.' . $color . 'label');
        foreach ($labels as $label) {
            Assert::eq($label->getText(), $status);
        }
    }

    /**
     * @Given I complete checkout
     */
    public function iCompleteCheckout(): void
    {
        $page = $this->getPage();
        $page->find('css', 'button')->press();
    }

    /**
     * @Given I submit form
     */
    public function iSubmitForm(): void
    {
        $page = $this->getPage();
        $page->find('css', '.ui.large.primary.icon.labeled.button')->press();
    }

    /**
     * @Given I choose shipment
     */
    public function iChooseShipment(): void
    {
        $page = $this->getPage();
        $page->find('css', '.ui.large.primary.icon.labeled.button')->press();
    }

    /**
     * @Given I choose payment
     */
    public function iChoosePayment(): void
    {
        $page = $this->getPage();
        $page->find('css', '.ui.large.primary.icon.labeled.button')->press();
    }

    /**
     * @Given I have :count products in cart
     */
    public function iHaveProductsInCart(int $count): void
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
     * @Given I have product :name in cart
     */
    public function iHaveProductInCart(string $name): void
    {
        $product = $this->sharedStorage->get('product');
        $slug = $product->getSlug();
        $this->productPage->open(['slug' => $slug]);
        $this->productPage->addToCart();
    }

    /**
     * @Given I click :button
     */
    public function iClickButton(string $button): void
    {
        $this->getPage()->pressButton($button);
    }

    /**
     * @Then I should see :ordersCount orders on page :pageNumber
     */
    public function iShouldSeeOrdersOnPage(int $ordersCount, int $pageNumber): void
    {
        $paginationLimit = $this->sharedStorage->get('pagination_limit');
        $this->visitPath(sprintf('/en_US/account/vendor/orders?limit=%d&page=%d', $paginationLimit, $pageNumber));
        $page = $this->getPage();
        $table = $page->find('css', '.ui.sortable.stackable.very.basic.celled.table');
        $orderRows = $table->findAll('css', '.item');

        Assert::count($orderRows, $ordersCount);
    }

    /**
     * @Given Pagination is set to display :paginationLimit orders per page
     */
    public function paginationIsSetToDisplayOrderPerPage(int $paginationLimit): void
    {
        $this->sharedStorage->set('pagination_limit', $paginationLimit);
    }

    /**
     * @Then I should see customer with name :name
     */
    public function iShouldSeeClientWithName(string $name): void
    {
        $page = $this->getPage();
        $table = $page->find('css', '.ui.sortable.stackable.very.basic.celled.table');
        assertStringContainsString($name, $table->getText());
    }

    /**
     * @Then I should not see customer with name :name
     */
    public function iShouldNotSeeClientWithName(string $name): void
    {
        $page = $this->getPage();
        assertStringNotContainsString($name, $page->getText());
    }

    /**
     * @Given I am on customers page
     */
    public function iAmOnCustomersPage(): void
    {
        $this->visitPath('en_US/account/vendor/customers');
    }

    /**
     * @Then I should see customer details with name :name
     */
    public function iShouldSeeCustomerDetailsWithName(string $name): void
    {
        $page = $this->getPage();
        $card = $page->find('css', '.ui.fluid.card');
        assertStringContainsString($name, $card->getText());
    }

    /**
     * @Given I add this product to the cart
     */
    public function iAddThisProductToTheCart(): void
    {
        $product = $this->sharedStorage->get('product');

        $slug = $product->getSlug();
        $this->productPage->open(['slug' => $slug]);
        $this->productPage->addToCart();

        $this->sharedStorage->set('product', $product);
    }

    /**
     * @Given I finalize order
     */
    public function iFinalizeOrder(): void
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
    public function primaryOrderShouldNotHaveNumber(): void
    {
        /** @var Order|null $order */
        $order = $this->orderRepository->findOneBy(['mode' => OrderInterface::PRIMARY_ORDER_MODE]);

        if (null !== $order) {
            Assert::eq($order->getNumber(), null);
        }
    }

    private function fillField(string $field, string $value): void
    {
        $field = $this->fixStepArgument($field);
        $value = $this->fixStepArgument($value);
        $this->getPage()->fillField($field, $value);
    }

    private function fixStepArgument($argument): array|string
    {
        return str_replace('\\"', '"', $argument);
    }

    private function selectOption(string $select, string $option): void
    {
        $select = $this->fixStepArgument($select);
        $option = $this->fixStepArgument($option);
        $this->getPage()->selectFieldOption($select, $option);
    }

    private function getPage(): DocumentElement
    {
        return $this->getSession()->getPage();
    }
}
