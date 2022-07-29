<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\PaymentCloner;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\PaymentInterface;
use Sylius\Component\Core\Model\PaymentMethodInterface;

final class PaymentClonerSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(PaymentCloner::class);
    }

    public function it_clones_payment(
        PaymentInterface $newPayment,
        PaymentInterface $originalPayment,
        PaymentMethodInterface $paymentMethod
    ): void {
        $date = new \DateTime('now');
        $originalPayment->getCreatedAt()->willReturn($date);
        $originalPayment->getCurrencyCode()->willReturn('USD');
        $originalPayment->getMethod()->willReturn($paymentMethod);
        $originalPayment->getState()->willReturn('new');
        $originalPayment->getDetails()->willReturn(['details']);
        $originalPayment->getUpdatedAt()->willReturn($date);

        $this->clone($originalPayment, $newPayment);

        $newPayment->setCreatedAt($date)->shouldHaveBeenCalledTimes(1);
        $newPayment->setCurrencyCode('USD')->shouldHaveBeenCalledTimes(1);
        $newPayment->setMethod($paymentMethod)->shouldHaveBeenCalledTimes(1);
        $newPayment->setDetails(['details'])->shouldHaveBeenCalledTimes(1);
        $newPayment->setState('new')->shouldHaveBeenCalledTimes(1);
        $newPayment->setUpdatedAt($date)->shouldHaveBeenCalledTimes(1);
    }
}
