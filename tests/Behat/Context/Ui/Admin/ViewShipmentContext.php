<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Ui\Admin;

use Behat\MinkExtension\Context\RawMinkContext;
use BitBag\OpenMarketplace\Component\Core\Common\Fixture\Factory\OrderExampleFactoryInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\Order;
use BitBag\OpenMarketplace\Component\Order\Factory\ShipmentFactoryInterface;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use SM\Factory\FactoryInterface as StateMachineFactoryInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Sylius\Component\Shipping\ShipmentTransitions;
use Webmozart\Assert\Assert;

final class ViewShipmentContext extends RawMinkContext
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private OrderExampleFactoryInterface $orderExampleFactory,
        private OrderRepositoryInterface $orderRepository,
        private ShipmentFactoryInterface $shipmentFactory,
        private SharedStorageInterface $sharedStorage,
        private StateMachineFactoryInterface $stateMachineFactory,
        ) {
    }

    /**
     * @BeforeScenario
     */
    public function clearData(): void
    {
        $purger = new ORMPurger($this->entityManager);
        $purger->purge();
    }

    /**
     * @Given store has primary and secondary order
     */
    public function storeHasPrimaryAndSecondaryOrderWithPayment(): void
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
    public function iShouldSeeShipments(int $count, string $mode): void
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

    private function applyShipmentTransitionOnOrder(OrderInterface $order, string $transition): void
    {
        foreach ($order->getShipments() as $shipment) {
            $this->stateMachineFactory->get($shipment, ShipmentTransitions::GRAPH)->apply($transition);
        }
    }
}
