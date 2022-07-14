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
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Webmozart\Assert\Assert;
use Sylius\Component\Core\OrderCheckoutTransitions;
use Sylius\Component\Customer\Model\CustomerInterface;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page\ShowProductPage;

class OrderContext extends RawMinkContext implements Context
{
    private ShowProductPage $productPage;
    private SharedStorageInterface $sharedStorage;

    public function __construct(
        ShowProductPage $productPage,
        SharedStorageInterface $sharedStorage,
    )
    {
        $this->productPage = $productPage;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Then I should see :count orders
     */
    public function iShouldSeeOrders($count)
    {
        $page = $this->getSession()->getPage();
        $tableWrapper = $page->find('css',"table");
        $orders = $tableWrapper->findAll('css','.item');
        Assert::eq(count($orders),$count);
//        dump(count($orders));
    }

    /**
     * @Given I complete checkout
     */
    public function iCompleteCheckout()
    {
        $page = $this->getSession()->getPage();
        $page->find("css","button")->press();

    }

    /**
     * @Given I have :count products in cart
     */
    public function iHaveProductsInCart($count)
    {
        $products = $this->sharedStorage->get('products');
        for($i=1; $i<=$count; $i++) {
            $slug = $products[$i]->getSlug();
            $this->productPage->open(['slug' => $slug]);
            $this->productPage->addToCart();
            sleep(1);
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

    private function applyTransitionOnOrderCheckout(OrderInterface $order, $transition)
    {
        $this->stateMachineFactory->get($order, OrderCheckoutTransitions::GRAPH)->apply($transition);
    }

    private function createOrder(
        CustomerInterface $customer,
        $number = null,
        ChannelInterface $channel = null,
        $localeCode = null
    ) {
        $order = $this->createCart($customer, $channel, $localeCode);

        if (null !== $number) {
            $order->setNumber($number);
        }

        $order->completeCheckout();

        return $order;
    }
}
