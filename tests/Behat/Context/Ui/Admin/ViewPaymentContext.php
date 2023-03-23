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
use BitBag\OpenMarketplace\Fixture\Factory\OrderExampleFactoryInterface;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Webmozart\Assert\Assert;

class ViewPaymentContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private OrderExampleFactoryInterface $orderExampleFactory;

    private OrderRepositoryInterface $orderRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        OrderExampleFactoryInterface $orderExampleFactory,
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->entityManager = $entityManager;
        $this->orderExampleFactory = $orderExampleFactory;
        $this->orderRepository = $orderRepository;
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
        $orders = $this->orderExampleFactory->createArray();

        foreach ($orders as $order) {
            $this->orderRepository->add($order);
        }
    }

    /**
     * @Then I should see :count payments
     */
    public function iShouldSeePayments($count)
    {
        $page = $this->getSession()->getPage();
        $tableWrapper = $page->find('css', 'table');
        $payments = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($payments), $count);
    }
}
