<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Factory;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\Settlement;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;

final class SettlementFactory implements SettlementFactoryInterface
{
    public function createNew(): SettlementInterface
    {
        return new Settlement();
    }

    public function createNewForVendorAndOrders(VendorInterface $vendor, array $orders): SettlementInterface
    {
        $settlement = $this->createNew();
        $settlement->setVendor($vendor);
        $settlement->setOrders(new ArrayCollection($orders));

        [$totalAmount, $totalCommission] = $this->calculateTotals($orders);
        $settlement->setTotalAmount($totalAmount);
        $settlement->setTotalCommissionAmount($totalCommission);
        $settlement->setStatus(SettlementInterface::STATUS_NEW);
        $settlement->setCurrencyCode($orders[array_key_first($orders)]->getCurrencyCode());
        $settlement->setStartDate($orders[array_key_first($orders)]->getCheckoutCompletedAt());
        $settlement->setEndDate($orders[array_key_last($orders)]->getCheckoutCompletedAt());

        return $settlement;
    }

    private function calculateTotals(array $orders): array
    {
        $totalAmount = 0;
        $totalCommission = 0;

        /** @var OrderInterface $order */
        foreach ($orders as $order) {
            $totalAmount += $order->getTotal();
            $totalCommission += $order->getCommissionTotal();
        }

        return [
            $totalAmount,
            $totalCommission,
        ];
    }
}
