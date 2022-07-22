<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\AddressClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderCloner;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\PaymentClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\ShipmentClonerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\AddressInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\PaymentInterface;
use Sylius\Component\Core\Model\ShipmentInterface;

final class OrderClonerSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        AddressClonerInterface $addressCloner,
        ShipmentClonerInterface $shipmentCloner,
        PaymentClonerInterface $paymentCloner
    ): void {
        $this->beConstructedWith($entityManager, $addressCloner, $shipmentCloner, $paymentCloner);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderCloner::class);
    }

    public function it_clones_all_values(
        EntityManagerInterface $entityManager,
        AddressClonerInterface $addressCloner,
        OrderInterface $originalOrder,
        OrderInterface $newOrder,
        AddressInterface $billingAddress,
        AddressInterface $shippingAddress,
        CustomerInterface $customer,
        ChannelInterface $channel,
        ShipmentInterface $shipment,
        PaymentInterface $payment
    ): void {
        $date = new \DateTime('now');

        $shipmentCollection = new ArrayCollection([$shipment->getWrappedObject()]);
        $paymentCollection = new ArrayCollection([$payment->getWrappedObject()]);
        $originalOrder->getBillingAddress()->willReturn($billingAddress);
        $originalOrder->getShippingAddress()->willReturn($shippingAddress);
        $originalOrder->getShipments()->willReturn($shipmentCollection);
        $originalOrder->getPayments()->willReturn($paymentCollection);

        $addressCloner->clone(Argument::any(), Argument::any())->shouldBeCalled();

        $originalOrder->getLocaleCode()->willReturn('US');
        $originalOrder->getChannel()->willReturn($channel);
        $originalOrder->getCheckoutCompletedAt()->willReturn($date);
        $originalOrder->getCreatedAt()->willReturn($date);
        $originalOrder->getCurrencyCode()->willReturn('USD');
        $originalOrder->getCustomerIp()->willReturn('127.0.0.1');
        $originalOrder->getCreatedByGuest()->willReturn(false);
        $originalOrder->getNotes()->willReturn(null);
        $originalOrder->getState()->willReturn('state');
        $originalOrder->getCheckoutState()->willReturn('state');
        $originalOrder->getPaymentState()->willReturn('state');
        $originalOrder->getShippingState()->willReturn('state');
        $originalOrder->getCustomer()->willReturn($customer);

        $this->clone($originalOrder, $newOrder);

        $newOrder->setBillingAddress(Argument::any())->shouldHaveBeenCalledTimes(1);
        $newOrder->setShippingAddress(Argument::any())->shouldHaveBeenCalledTimes(1);
        $newOrder->setLocaleCode('US')->shouldHaveBeenCalledTimes(1);
        $newOrder->setChannel($channel)->shouldHaveBeenCalledTimes(1);
        $newOrder->setCheckoutCompletedAt($date)->shouldHaveBeenCalledTimes(1);
        $newOrder->setCurrencyCode('USD')->shouldHaveBeenCalledTimes(1);
        $newOrder->setCustomerIp('127.0.0.1')->shouldHaveBeenCalledTimes(1);
        $newOrder->setCreatedByGuest(false)->shouldHaveBeenCalledTimes(1);
        $newOrder->setNotes(null)->shouldHaveBeenCalledTimes(1);
        $newOrder->setCreatedAt($date)->shouldHaveBeenCalledTimes(1);
        $newOrder->setState('state')->shouldHaveBeenCalledTimes(1);
        $newOrder->setCheckoutState('state')->shouldHaveBeenCalledTimes(1);
        $newOrder->setPaymentState('state')->shouldHaveBeenCalledTimes(1);
        $newOrder->setShippingState('state')->shouldHaveBeenCalledTimes(1);
        $newOrder->setCustomer($customer)->shouldHaveBeenCalledTimes(1);
        $entityManager->flush()->shouldHaveBeenCalledTimes(1);
    }
}
