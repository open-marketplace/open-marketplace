<?php

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Refresher;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Refresher\PaymentRefresher;
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
