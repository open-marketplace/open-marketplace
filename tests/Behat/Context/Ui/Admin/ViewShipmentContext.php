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
use BitBag\OpenMarketplace\Factory\ShipmentFactoryInterface;
use BitBag\OpenMarketplace\Fixture\Factory\OrderExampleFactoryInterface;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Webmozart\Assert\Assert;

class ViewShipmentContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private OrderExampleFactoryInterface $orderExampleFactory;

    private OrderRepositoryInterface $orderRepository;

    private ShipmentFactoryInterface $shipmentFactory;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        EntityManagerInterface $entityManager,
        OrderExampleFactoryInterface $orderExampleFactory,
        OrderRepositoryInterface $orderRepository,
        ShipmentFactoryInterface $shipmentFactory,
        SharedStorageInterface $sharedStorage
    ) {
        $this->entityManager = $entityManager;
        $this->orderExampleFactory = $orderExampleFactory;
        $this->orderRepository = $orderRepository;
        $this->shipmentFactory = $shipmentFactory;
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
        /** @var Order[] $orders */
        $orders = $this->orderExampleFactory->createArray();
        $shippingMethod = $this->sharedStorage->get('shipping_method');

        foreach ($orders as $order) {
            $shipment = $this->shipmentFactory->createNewWithOrder($order);
            $shipment->setMethod($shippingMethod);
            $order->addShipment($shipment);
            $this->orderRepository->add($order);
        }
    }

    /**
     * @Then I should see :count shipments
     */
    public function iShouldSeePayments($count)
    {
        $page = $this->getSession()->getPage();
        $tableWrapper = $page->find('css', 'table');
        $shipments = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($shipments), $count);
    }
}
