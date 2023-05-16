<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Vendor;

use Behat\Behat\Context\Context;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\VendorSettlementInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Webmozart\Assert\Assert;

final class VendorSettlementContext implements Context
{
    private OrderRepositoryInterface $orderRepository;

    private EntityManagerInterface $entityManager;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        EntityManagerInterface $entityManager,
        SharedStorageInterface $sharedStorage
    ) {
        $this->orderRepository = $orderRepository;
        $this->entityManager = $entityManager;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Then commission should be calculated for each secondary order
     */
    public function commissionShouldBeCalculatedForEachSecondaryOrder()
    {
        $orders = $this->orderRepository->findBy(['mode' => OrderInterface::SECONDARY_ORDER_MODE]);

        /** @var OrderInterface $order */
        foreach ($orders as $order) {
            $vendor = $order->getVendor();
            $settlement = $vendor->getVendorSettlement();
            $validCommissionTotal =
                match ($settlement->getCommissionType()) {
                    VendorSettlementInterface::NET_COMMISSION => $this->calculateNetCommision($order, $settlement->getCommission()),
                    VendorSettlementInterface::GROSS_COMMISSION => $this->calculateGrossCommision($order, $settlement->getCommission()),
                    default => throw new \InvalidArgumentException('Invalid Commission Type')
                };

            Assert::eq($order->getCommissionTotal(), $validCommissionTotal);
        }
    }

    /**
     * @Then commissions should not be calculated for primary orders
     */
    public function commissionShouldNotBeCalculatedForPrimaryOrders()
    {
        $orders = $this->orderRepository->findBy(['mode' => OrderInterface::PRIMARY_ORDER_MODE]);

        /** @var OrderInterface $order */
        foreach ($orders as $order) {
            Assert::null($order->getCommissionTotal());
        }
    }

    private function calculateNetCommision(OrderInterface $order, int $commission): int
    {
        return $order->getItemsTotal() * (1 + $commission / 100);
    }

    private function calculateGrossCommision(OrderInterface $order, int $commission): int
    {
        return $order->getTotal() * (1 + $commission / 100);
    }
}
