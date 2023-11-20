<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\Factory;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\SettlementFactory;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;

final class SettlementFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SettlementFactory::class);
    }

    public function it_creates_for_vendor_and_orders(
        VendorInterface $vendor,
        OrderInterface $order1,
        OrderInterface $order3,
        OrderInterface $order2,
        ): void {
        $dateEnd = new \DateTime('now');
        $dateStart = $dateEnd->modify('-7 day');
        $order1->getTotal()->willReturn(100);
        $order1->getCommissionTotal()->willReturn(10);
        $order1->getCurrencyCode()->willReturn('USD');
        $order1->getCheckoutCompletedAt()->willReturn($dateStart);
        $order2->getTotal()->willReturn(50);
        $order2->getCommissionTotal()->willReturn(5);
        $order3->getTotal()->willReturn(80);
        $order3->getCommissionTotal()->willReturn(20);
        $order3->getCheckoutCompletedAt()->willReturn($dateEnd);

        $item = $this->createNewForVendorAndOrders($vendor, [$order1, $order2, $order3]);
        $item->shouldBeAnInstanceOf(SettlementInterface::class);
        $item->getCurrencyCode()->shouldBe('USD');
        $item->getTotalAmount()->shouldBe(230);
        $item->getTotalCommissionAmount()->shouldBe(35);
    }
}
