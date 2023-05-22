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
use SM\Factory\FactoryInterface as StateMachineFactoryInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Sylius\Component\Shipping\ShipmentTransitions;
use Webmozart\Assert\Assert;

final class ViewShipmentContext extends RawMinkContext implements Context
{
    private EntityManagerInterface $entityManager;

    private OrderExampleFactoryInterface $orderExampleFactory;

    private OrderRepositoryInterface $orderRepository;

    private ShipmentFactoryInterface $shipmentFactory;

    private SharedStorageInterface $sharedStorage;

    private StateMachineFactoryInterface $stateMachineFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        OrderExampleFactoryInterface $orderExampleFactory,
        OrderRepositoryInterface $orderRepository,
        ShipmentFactoryInterface $shipmentFactory,
        SharedStorageInterface $sharedStorage,
        StateMachineFactoryInterface $stateMachineFactory,
        ) {
        $this->entityManager = $entityManager;
        $this->orderExampleFactory = $orderExampleFactory;
        $this->orderRepository = $orderRepository;
        $this->shipmentFactory = $shipmentFactory;
        $this->sharedStorage = $sharedStorage;
        $this->stateMachineFactory = $stateMachineFactory;
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
            $this->applyShipmentTransitionOnOrder($order, ShipmentTransitions::TRANSITION_CREATE);
            $this->orderRepository->add($order);
        }
    }

    /**
     * @Then I should see :count shipment(s) for :mode order(s)
     */
    public function iShouldSeeShipments($count, $mode)
    {
        $page = $this->getSession()->getPage();
        $tableWrapper = $page->find('css', 'table');
        $shipments = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($shipments), $count);
        $htmlString = $page->getHtml();
        $pattern = "/\/admin\/orders\/(\d+)/";
        preg_match_all($pattern, $htmlString, $matches);
        $orderRepository = $this->entityManager->getRepository(Order::class);
        $orders = $orderRepository->findBy(['id' => $matches[1]]);
        foreach ($orders as $order) {
            Assert::eq($order->getMode(), $mode);
        }
    }

    private function applyShipmentTransitionOnOrder(OrderInterface $order, $transition): void
    {
        foreach ($order->getShipments() as $shipment) {
            $this->stateMachineFactory->get($shipment, ShipmentTransitions::GRAPH)->apply($transition);
        }
    }
}
