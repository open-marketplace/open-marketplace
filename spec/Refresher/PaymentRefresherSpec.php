<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Refresher;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Refresher\PaymentRefresher;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\PaymentInterface;

class PaymentRefresherSpec extends ObjectBehavior
{
    public function let(EntityManager $entityManager): void
    {
        $this->beConstructedWith($entityManager);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(PaymentRefresher::class);
    }

    public function it_refreshes_payment(
        OrderInterface $order,
        PaymentInterface $payment,
    ): void {
        $order->recalculateItemsTotal()->shouldBeCalledOnce();
        $order->recalculateAdjustmentsTotal()->shouldBeCalledOnce();
        $order->getTotal()->willReturn(100);

        $payments = new ArrayCollection([$payment->getWrappedObject()]);
        $order->getPayments()->willReturn($payments);

        $this->refreshPayment($order);

        $payment->setAmount(100)->shouldHaveBeenCalledTimes(1);
    }
}
