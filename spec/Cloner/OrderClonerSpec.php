<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\AddressCloner;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderCloner;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\Address;
use Sylius\Component\Core\Model\AddressInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class OrderClonerSpec extends ObjectBehavior
{
    public function let(EntityManagerInterface $entityManager, AddressCloner $addressCloner): void
    {
        $this->beConstructedWith($entityManager, $addressCloner);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderCloner::class);
    }

    public function it_clones_all_values(
        EntityManagerInterface $entityManager,
        AddressCloner $addressCloner,
        OrderInterface $originalOrder,
        OrderInterface $newOrder,
        AddressInterface $billingAddress,
        AddressInterface $shippingAddress,
        CustomerInterface $customer,
        ChannelInterface $channel
    ): void {
        $date = new \DateTime('now');

        $originalOrder->getBillingAddress()->willReturn($billingAddress);
        $originalOrder->getShippingAddress()->willReturn($shippingAddress);

        $addressCloner->clone(Argument::any(), Argument::any())->shouldBeCalled();

        $originalOrder->getLocaleCode()->willReturn("US");
        $originalOrder->getChannel()->willReturn($channel);
        $originalOrder->getCheckoutCompletedAt()->willReturn($date);
        $originalOrder->getCreatedAt()->willReturn($date);
        $originalOrder->getCurrencyCode()->willReturn("USD");
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
        $newOrder->setLocaleCode("US")->shouldHaveBeenCalledTimes(1);
        $newOrder->setChannel($channel)->shouldHaveBeenCalledTimes(1);
        $newOrder->setCheckoutCompletedAt($date)->shouldHaveBeenCalledTimes(1);
        $newOrder->setCurrencyCode("USD")->shouldHaveBeenCalledTimes(1);
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
