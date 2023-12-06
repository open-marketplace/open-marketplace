<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Order\Refresher;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Order\Refresher\PaymentRefresher;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\PaymentInterface;
use Sylius\Component\Core\Model\PaymentMethodInterface;

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
        OrderInterface $secondaryOrder,
        OrderInterface $primaryOrder,
        PaymentInterface $secondaryOrderPayment,
        PaymentInterface $primaryOrderPayment,
        PaymentMethodInterface $paymentMethod,
    ): void {
        $secondaryOrder->recalculateItemsTotal()->shouldBeCalledOnce();
        $secondaryOrder->recalculateAdjustmentsTotal()->shouldBeCalledOnce();

        $secondaryOrder->getTotal()->willReturn(100)->shouldBeCalledOnce();
        $secondaryOrderPayment->setAmount(100)->shouldBeCalledOnce();

        $secondaryOrderPayments = new ArrayCollection([$secondaryOrderPayment->getWrappedObject()]);
        $primaryOrderPayments = new ArrayCollection([$primaryOrderPayment->getWrappedObject()]);

        $secondaryOrder->getPayments()->willReturn($secondaryOrderPayments);
        $secondaryOrder->getPrimaryOrder()->willReturn($primaryOrder);
        $primaryOrder->getPayments()->willReturn($primaryOrderPayments);

        $primaryOrderPayment->getMethod()->willReturn($paymentMethod);
        $secondaryOrderPayment->setMethod($paymentMethod)->shouldBeCalledOnce();

        $this->refreshPayment($secondaryOrder);
    }
}
