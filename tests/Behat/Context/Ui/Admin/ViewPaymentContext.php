<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Entity\Order;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Fixture\Factory\OrderExampleFactoryInterface;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Webmozart\Assert\Assert;

class ViewPaymentContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private OrderExampleFactoryInterface $orderExampleFactory;

    private OrderRepositoryInterface $orderRepository;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        EntityManagerInterface $entityManager,
        OrderExampleFactoryInterface $orderExampleFactory,
        OrderRepositoryInterface $orderRepository,
        SharedStorageInterface $sharedStorage
    ) {
        $this->entityManager = $entityManager;
        $this->orderExampleFactory = $orderExampleFactory;
        $this->orderRepository = $orderRepository;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @BeforeScenario
     */
    public function clearData()
    {
        $purger = new ORMPurger($this->entityManager);
        $purger->purge();
    }

    /**
     * @Given store has primary and secondary order
     */
    public function storeHasPrimaryAndSecondaryOrderWithPayment()
    {
        $options['complete_date'] = new \DateTime();
        $orders = $this->orderExampleFactory->createArray($options);

        foreach ($orders as $order) {
            $this->orderRepository->add($order);
        }
    }

    /**
     * @Given store has primary and secondary order with payment state :paymentState
     */
    public function storeHasPrimaryAndSecondaryOrderWithPaymentState(string $paymentState)
    {
        $options['complete_date'] = new \DateTime();
        $orders = $this->orderExampleFactory->createArray($options);

        /** @var Order $order */
        foreach ($orders as $order) {
            $order->setPaymentState($paymentState);
            $this->orderRepository->add($order);
        }
    }

    /**
     * @Then I should see :count payment(s) for :mode order(s)
     */
    public function iShouldSeePayments($count, $mode)
    {
        $page = $this->getSession()->getPage();
        $tableWrapper = $page->find('css', 'table');
        $payments = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($payments), $count);
        $htmlString = $page->getHtml();
        $pattern = "/\/admin\/orders\/(\d+)/";
        preg_match_all($pattern, $htmlString, $matches);
        $orderRepository = $this->entityManager->getRepository(Order::class);
        $orders = $orderRepository->findBy(['id' => $matches[1]]);
        foreach ($orders as $order){
            Assert::eq($order->getMode(), $mode);
        }
    }

    /**
     * @Then statistics should omit primary order
     */
    public function iViewStatistics()
    {
        $page = $this->getSession()->getPage();
        $totalSalesStats = $this->currencyToInt($page->find('css', '#total-sales')->getText());
        $newOrdersStats = (int) $page->find('css', '#new-orders')->getText();
        $avarageOrderValueStats = $this->currencyToInt($page->find('css', '#average-order-value')->getText());

        /** @var Order $order */
        $order = $this->orderRepository->findOneBy(['mode' => OrderInterface::SECONDARY_ORDER_MODE]);
        $channel = $this->sharedStorage->get('channel');
        $year = $order->getCheckoutCompletedAt()->format('Y');
        $startDate = new \DateTime("01-01-{$year}");
        $endDate = new \DateTime("31-12-{$year}");

        $totalSales = $this->orderRepository->getTotalPaidSalesForChannelInPeriod($channel, $startDate, $endDate);
        $newOrders = $this->orderRepository->countPaidForChannelInPeriod($channel, $startDate, $endDate);
        $avarageOrderValue = $totalSales / $newOrders;

        Assert::eq($totalSalesStats, $totalSales);
        Assert::eq($newOrdersStats, $newOrders);
        Assert::eq($avarageOrderValueStats, $avarageOrderValue);
    }

    private function currencyToInt(string $value): int
    {
        return (int) preg_replace('/[^0-9]/', '', $value);
    }
}
